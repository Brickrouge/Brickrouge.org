
Locale.define('en', 'Calendar', {

	standalone_months: [ 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ],
	standalone_narrow_days: [ 'S', 'M', 'T', 'W', 'T', 'F', 'S' ],
	weeknumber: 'W'

})

Locale.define('fr', 'Calendar', {

	standalone_months: [ 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre' ],
	standalone_narrow_days: [ 'D', 'L', 'M', 'M', 'J', 'V', 'S' ],
	weeknumber: 'S'

})

Locale.define('fr', 'Popover', {

	ok: 'Utiliser',
	cancel: 'Annuler'

})

//Locale.use('en')

Locale.getCurrent().define('Date', 'firstDayOfWeek', 1); // Monday

/**
 * Defines the 'pageup' key for the event code 33.
 */
DOMEvent.defineKey(33, 'pageup')

/**
 * Defines the 'pagedown' key for the event code 34.
 */
DOMEvent.defineKey(34, 'pagedown')

/**
 * Creates a Date object from different source types.
 *
 * @param source
 *
 * @return Date
 */
Date.from = function(source) {

	var REGEX = /^((\d+)-(\d{2})-(\d{2}))(T|)?(((\d{2}):(\d{2}):(\d{2}))((\+|\-)(\d{4}))?)?/
	, date = null

	if (typeOf(source) == 'string')
	{
		if (source == 'now')
		{
			date = new Date()
		}
		else
		{
			/*
			console.log("2011-28-12".match(REGEX))
			console.log("2011-28-12T23:32:10".match(REGEX))
			console.log("2011-28-12T23:32:10+2000".match(REGEX))
			console.log("2011-28-12T23:32:10-2000".match(REGEX))
			*/
			var capture = source.match(REGEX)

			if (capture)
			{
				if (capture[6])
				{
					date = new Date(capture[2], capture[3] - 1, capture[4], capture[8], capture[9], capture[10])
				}
				else
				{
					date = new Date(capture[2], capture[3] - 1, capture[4])
				}
			}
			else
			{
				date = new Date()
			}
		}
	}
	else if (source instanceof Date)
	{
		date = new Date(source.getTime())
	}

	return date
}

/**
 * Get the ISO week date week number
 *
Date.prototype.getWeek = function () {
	// Create a copy of this date object
	var target  = new Date(this.valueOf());

	// ISO week date weeks start on monday
	// so correct the day number
	var dayNr   = (this.getDay() + 6) % 7;

	// ISO 8601 states that week 1 is the week
	// with the first thursday of that year.
	// Set the target date to the thursday in the target week
	target.setDate(target.getDate() - dayNr + 3);

	// Store the millisecond value of the target date
	var firstThursday = target.valueOf();

	// Set the target to the first thursday of the year
	// First set the target to january first
	target.setMonth(0, 1);
	// Not a thursday? Correct the date to the next thursday
	if (target.getDay() != 4) {
		target.setMonth(0, 1 + ((4 - target.getDay()) + 7) % 7);
	}

	// The weeknumber is the number of weeks between the
	// first thursday of the year and the thursday in the target week
	return 1 + Math.ceil((firstThursday - target) / 604800000); // 604800000 = 7 * 24 * 3600 * 1000
}
*/
/**
 * A calendar.
 *
 * @property editors Object The date editors array.
 * @property element Element The element used to display the calendar.
 * @property month Brickrouge.Calendar.Month The object used to display a month of the calendar.
 * @property monthName Element|null The element used to display the name of the month.
 * @property yearName Element|null The element used to display the name of the year.
 */
Brickrouge.Calendar = new Class({

	Implements: [ Options, Events ],

	options: {

		date: null,
		noWeekNumber: false

	},

	initialize: function(el, options)
	{
		this.element = document.id(el)
		this.setOptions(options)

		this.element.addEvents({

			'click:relay([data-decrement])': function(ev, el) {

				this.decrement(el.get('data-decrement'), el.get('data-decrement-amount') || 1)

			}.bind(this),

			'click:relay([data-increment])': function(ev, el) {

				this.increment(el.get('data-increment'), el.get('data-increment-amount') || 1)

			}.bind(this),

			'click:relay([data-edit])': function(ev, el) {

				this.edit(el.get('data-edit'), this.month.date, el)

			}.bind(this),

			keypress: this.onKeyPress.bind(this)
		})

		this.editors = {}
		this.monthName = this.element.getElement('.month .name')
		this.yearName = this.element.getElement('.year .name')
		this.month = this.createMonth(this.element.getElement('tbody'), {

			noWeekNumber: this.options.noWeekNumber

		})

		this.month.observe('update', function (date) {

			this.renderMonthName(date)
			this.renderYearName(date)
			this.fireUpdate(date)

		}.bind(this))

		this.month.observe('change', function (date) {

			this.renderMonthName(date)
			this.renderYearName(date)
			this.fireChange(date)

		}.bind(this))

		this.setDate(this.options.date || 'now')
	},

	createMonth: function(el, options)
	{
		return new Brickrouge.Calendar.Month(el, options)
	},

	setDate: function(date)
	{
		this.render(date instanceof Date ? date : Date.from(date))
	},

	onKeyPress: function(ev)
	{
		if (ev.key == 'e')
		{
			ev.stop()

			this.edit('my', this.month.date, this.element.getElement('caption') || this.element)
		}
	},

	fireUpdate: function()
	{
		this.fireEvent('update', arguments)
	},

	fireChange: function()
	{
		this.fireEvent('change', arguments)
	},

	increment: function(what, amount)
	{
		this.render(new Date(this.month.date).increment(what, amount))
	},

	decrement: function(what, amount)
	{
		this.render(new Date(this.month.date).decrement(what, amount))
	},

	edit: function(type, date, anchor)
	{
		var editor = this.getEditor(type)

		editor.setDate(date)
		editor.attachAnchor(anchor)
		editor.show()
		editor.focus()
	},

	getEditor: function(type)
	{
		if (this.editors[type]) return this.editors[type]

		var editor = new Brickrouge.Calendar.Editor({

			type: type

		})

		editor.addEvent('action', function(action, params) {

			if (action == 'ok')
			{
				var date = Date.from(this.month.date)

				if (params.year)
				{
					date.setFullYear(params.year)
				}

				if (params.month)
				{
					date.setMonth(params.month - 1)
				}

				if (params.day)
				{
					date.setDate(params.day)
				}

				editor.hide()
				this.render(date)
				this.focus()
			}
			else if (action == 'cancel')
			{
				editor.hide()
				this.focus()
			}

		}.bind(this))

		return this.editors[type] = editor
	},

	render: function(date)
	{
		this.month.setDate(date)
		this.renderMonthName(date)
		this.renderYearName(date)
	},

	renderMonthName: function(date)
	{
		if (!this.monthName) return

		var month = Locale.get('Calendar.standalone_months') || Locale.get('Date.months')

		this.monthName.innerHTML = month[date.getMonth()]
	},

	renderYearName: function(date)
	{
		if (!this.yearName) return

		this.yearName.innerHTML = date.getFullYear()
	},

	focus: function()
	{
		this.element.querySelector('[tabindex]').focus()
	}
})

/**
 * Creates a calendar element according to options:
 *
 * - caption: A `caption` element or one of the following special values: '+ym',
 * 'ym'.
 * - noDayNames: The day names element is not created.
 * - noWeekNumber: The elements use to display the week number are not created.
 */
Brickrouge.Calendar.from = function(options)
{
	var el = new Element('table.calendar[role="grid"][aria-labelledby="month"]')
	, caption = null
	, head = null
	, headRow
	, body
	, weekdays = /*Locale.get('Calendar.standalone_narrow_days') || Locale.get('Date.days') ||*/ [ 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su' ]

//	if (options.caption)
	{
		/*
		if (options.caption[0] == '+')
		{

		}
		else
		{

		}
		*/

		caption = new Element('caption', {

			html: '<span class="date">'
			+ '<span class="browse prev" data-decrement="month">←</span>'
			+ '<span class="name" data-edit="my">'
			+ '<span class="month"><span class="name">&nbsp;</span></span>'
			+ '<span class="year"><span class="name">&nbsp;</span></span>'
			+ '</span>'
			+ '<span class="browse next" data-increment="month">→</span>'
			+ '</span>'
		})
	}

	if (!options.noDayNames)
	{
		headRow = new Element('tr.calendar-weekdays')

		if (!options.noWeekNumber)
		{
			headRow.adopt(new Element('th.calendar-weekcount', { html: Locale.get('Calendar.weeknumber') || 'W' }))
		}

		weekdays.each(function(name) {

			headRow.adopt(new Element('th.calendar-weekday', { html: name }))

		})

		head = new Element('thead').adopt(headRow)
	}

	body = new Element('tbody.calendar-month[tabindex="0"]')

	el.adopt([ caption, head, body ])

	return new Brickrouge.Calendar(el, options)
}

!function (Brickrouge) {

	const NOTIFY_UPDATE = 'update'
	const NOTIFY_CHANGE = 'change'

	/**
	 * A calendar month.
	 *
	 * @property element Element The container element.
	 * @property date Date A date in the month to render.
	 * @property now Date Current date at the initialization of the object.
	 * @property options
	 */
	Brickrouge.Calendar.Month = new Class({

		Implements: [ Options, Brickrouge.Subject ],

		options: {

			date: null,
			dontFollowOverlap: false,
			noWeekNumber: false,
			noInput: false

		},

		/**
		 * Initialize the {@link element} and {@link now} properties.
		 *
		 * If the `dontFollowOverlap` option is not true an event is added to the element to follow
		 * overlap days.
		 *
		 * @param {Element|string} el If the container element is a `TABLE` its `TBODY` element is used
		 * instead.
		 *
		 * @param options
		 */
		initialize: function(el, options)
		{
			this.element = document.id(el)

			if (this.element.tagName == 'TABLE')
			{
				this.element = this.element.querySelector('tbody')
			}

			this.setOptions(options)
			this.now = new Date()
			this.date = null

			this.element.addEvents({

				'click:relay(.calendar-day)': function(ev, el) {

					this.element.focus()

					if (!this.options.dontFollowOverlap && el.classList.contains('overlap'))
					{
						this.setDate(el.getAttribute('data-date'))
						this.fireUpdate(this.date, el)

						return
					}

					if (!this.options.noInput && !el.classList.contains('disabled'))
					{
						this.setDate(el.getAttribute('data-date'))
						this.fireChange(this.date, el)
					}

				}.bind(this),

				keydown: this.onKeyDown.bind(this),

				keypress: this.onKeyPress.bind(this)
			})

			this.setDate(this.options.date || this.now)
		},

		onKeyDown: function(ev)
		{
			var date = null, unit = 'day'

			if (ev.alt)
			{
				unit = 'year'
			}
			else if (ev.shift)
			{
				unit = 'month'
			}

			switch (ev.key)
			{
				case 'left':
					date = Date.from(this.date).decrement(unit, 1)
					break
				case 'right':
					date = Date.from(this.date).increment(unit, 1)
					break
				case 'up':
					date = Date.from(this.date).decrement('day', 7)
					break
				case 'down':
					date = Date.from(this.date).increment('day', 7)
					break
				case 'pageup':
					date = Date.from(this.date).decrement(ev.shift ? 'year' : 'month', 1)
					break
				case 'pagedown':
					date = Date.from(this.date).increment(ev.shift ? 'year' : 'month', 1)
					break
			}

			if (date)
			{
				ev.stop()
				this.setDate(date)
				this.fireUpdate(this.date)
			}
		},

		onKeyPress: function(ev)
		{
			var date = null

			switch (ev.key)
			{
				case 't':
					date = new Date()
					break
				case 'm':
				case 'y':
					date = Date.from(this.date)[ev.shift ? 'decrement' : 'increment'](ev.key == 'm' ? 'month' : 'year', ev.alt ? 10 : 1)
					break
				case 'enter':
				case 'space':
					this.fireChange(this.date)
					break
			}

			if (date)
			{
				ev.stop()
				this.setDate(date)
				this.fireUpdate(this.date)
			}
		},

		/**
		 * Fires `NOTIFY_UPDATE` with the specified arguments.
		 *
		 * @protected
		 */
		fireUpdate: function()
		{
			this.notify(NOTIFY_UPDATE, arguments)
		},

		/**
		 * Fires `NOTIFY_CHANGE` with the specified arguments.
		 *
		 * @protected
		 */
		fireChange: function()
		{
			this.notify(NOTIFY_CHANGE, arguments)
		},

		setDate: function(date)
		{
			this.date = Date.from(date)
			this.render(this.date)
		},

		render: function(date)
		{
			var day = date.getDate()
			, start = Date.from(date).decrement('day', day - 1)
			, overlap = start.format('%w')
			, weeks = []
			, i

			if (overlap == 0) overlap = 7
			overlap--

			start.decrement('day', overlap)

			i = Math.ceil((overlap + date.get('lastdayofmonth')) / 7)

			while (i--)
			{
				weeks.push(this.renderWeek(start))
			}

			Brickrouge.empty(this.element)

			weeks.forEach(function (week) {

				this.appendChild(week)

			}.bind(this.element))
		},

		renderWeek: function(date)
		{
			var days = []
			, i = 7
			, num = date.format('%U')
			, row = new Element('tr.calendar-week')

			while (i--)
			{
				days.push(this.renderDay(date))

				date.increment('day', 1)
			}

			if (!this.options.noWeekNumber)
			{
				row.adopt(new Element('td.calendar-weeknum', { html: num }))
			}

			row.adopt(days)

			return row
		},

		renderDay: function(date)
		{
			var formattedDate = date.format('%Y-%m-%d')
			, i = date.format('%w')
			, el = new Element('td.calendar-day', {

				html: date.format('%d').toInt(),
				'data-date': formattedDate

			})

			if (i == 0 || i == 6)
			{
				el.classList.add('weekend')
			}

			if (date.getMonth() != this.date.getMonth())
			{
				el.classList.add('overlap')
			}

			if (formattedDate == this.now.format('%Y-%m-%d'))
			{
				el.classList.add('today')
			}

			if (formattedDate == this.date.format('%Y-%m-%d'))
			{
				el.classList.add('active')
			}

			return el
		}
	})

	Brickrouge.Calendar.Month.NOTIFY_CHANGE = NOTIFY_CHANGE
	Brickrouge.Calendar.Month.NOTIFY_UPDATE = NOTIFY_UPDATE

} (Brickrouge)

/**
 * A date editor.
 *
 * The editor can be configured to edit a year, a month or a date (year, month, day).
 *
 * @property yearControl Element The input element used to edit the year.
 * @property monthControl Element The input element used to edit the month.
 * @property dayControl Element The input element used to edit the day.
 * @property popover Brickrouge.Popover The popover which contains the editor.
 */
Brickrouge.Calendar.Editor = new Class({

	Implements: [ Options, Events ],

	options: {

		type: 'my',
		date: null

	},

	initialize: function(options)
	{
		this.setOptions(options)

		this.yearControl = null
		this.monthControl = null
		this.dayControl = null

		var type = this.options.type
		, controls = []
		, content = []
		, control = null
		, i = 0
		, y

		if (type == 'year')
		{
			type = 'y'
		}
		else if (type == 'month')
		{
			type = 'm'
		}
		else if (type == 'date')
		{
			type = 'ymd'
		}

		for (y = type.length ; i < y ; i++)
		{
			switch (type[i])
			{
				case 'y':
					this.yearControl = control = new Element('input[type="text"][size="4"][name="year"].form-control')
					break
				case 'm':
					this.monthControl = control = new Element('input[type="text"][size="4"][name="month"].form-control')
					break
				case 'd':
					this.dayControl = control = new Element('input[type="text"][size="4"][name="day"]')
					break
			}

			control.addEvent('keypress', function(ev) {

				if (ev.key == 'enter')
				{
					this.ok()
				}
				else if (ev.key == 'esc')
				{
					this.cancel()
				}

			}.bind(this))

			controls.push(control)
			content.push(control)
			content.push(new Element('span.separator', { html: ' &ndash; ' }))
		}

		content.pop()

		if (this.options.date)
		{
			this.setDate(this.options.date)
		}

		this.popover = Brickrouge.Popover.from({

			actions: 'boolean',
			content: content,
			placement: 'below'

		})

		this.popover.element.addClass('calendar-editor')

		this.popover.addEvent('action', function(ev) {

			if (ev.action == 'ok')
			{
				this.ok()
			}
			else if (ev.action == 'cancel')
			{
				this.cancel()
			}

		}.bind(this))
	},

	setDate: function(date)
	{
		if (this.yearControl)
		{
			this.yearControl.set('value', date.getFullYear())
		}

		if (this.monthControl)
		{
			this.monthControl.set('value', date.getMonth() + 1)
		}

		if (this.dayControl)
		{
			this.dayControl.set('value', date.getDate())
		}
	},

	ok: function()
	{
		var year = null
		, month = null
		, day = null

		if (this.yearControl)
		{
			year = this.yearControl.get('value')
		}

		if (this.monthControl)
		{
			month = this.monthControl.get('value')
		}

		if (this.dayControl)
		{
			day = this.dayControl.get('value')
		}

		this.fireAction('ok', { year: year, month: month, day: day })
	},

	cancel: function()
	{
		this.fireAction('cancel')
	},

	fireAction: function(action, params)
	{
		this.fireEvent('action', arguments)
	},

	attachAnchor: function(anchor) {

		this.popover.attachAnchor(anchor)
	},

	show: function()
	{
		this.popover.show()
	},

	hide: function()
	{
		this.popover.hide()
	},

	focus: function()
	{
		var control = this.yearControl || this.monthControl || this.dayControl

		if (!control) return

		control.focus()
	}
})

Brickrouge.Datepicker = new Class({

	Implements: [ Options ],

	options: {

		anchor: null

	},

	initialize: function(options)
	{
		this.setOptions(options)

		var skipFocus = false
		, anchor = this.anchor = document.id(this.options.anchor)
		, calendar = this.calendar = Brickrouge.Calendar.from(options)
		, popover = this.popover = Brickrouge.Popover.from({

			anchor: anchor,
			content: calendar.element,
			loveContent: true

		})

		popover.element.classList.add('datepicker')

		calendar.addEvent('change', function(date) {

			var anchor = this.anchor

			if (anchor.tagName == 'INPUT')
			{
				anchor.set('value', date.format('%Y-%m-%d'))
			}

			skipFocus = true
			this.anchor.focus()
			this.hide()

		}.bind(this))

		if (anchor)
		{
			popover.element.addEvent('click', function(ev) {

				ev.stop()
				anchor.focus()

			})

			anchor.addEvents({

				click: function(ev) {

					ev.stop()
					this.show()

				}.bind(this),

				focus: function(ev) {

					if (skipFocus)
					{
						skipFocus = false
						return
					}

					this.show()

				}.bind(this),

				keydown: function(ev)
				{
					if (ev.key == 'tab')
					{
						this.hide()
					}
					else if (this.popover.isVisible())
					{
						this.calendar.month.onKeyDown(ev)
					}

				}.bind(this),

				keypress: function(ev)
				{
					if (this.popover.isVisible())
					{
						if (ev.key == 'esc')
						{
							this.hide()
							return
						}

						this.calendar.month.onKeyPress(ev)
						this.calendar.onKeyPress(ev)
					}
					else if (ev.key == 'enter')
					{
						ev.stop()
						this.show()
					}

				}.bind(this)
			})
		}
	},

	show: function()
	{
		if (this.popover.isVisible())
		{
			return
		}

		Brickrouge.Datepicker.closeAll()

		if (this.anchor)
		{
			this.calendar.setDate(this.anchor.get('value') || 'now')
		}

		this.popover.show()

		if (Brickrouge.Datepicker.opened.indexOf(this) == -1)
		{
			Brickrouge.Datepicker.opened.push(this)
		}
	},

	/**
	 * Hides the date picker.
	 *
	 * The popover is hidden with all the editors of the calendar, and the datepicker is removed
	 * from the opened datepickers list.
	 */
	hide: function()
	{
		Object.each(this.calendar.editors, function(editor) {

			editor.hide()
		})

		this.popover.hide()

		Brickrouge.Datepicker.opened.erase(this)
	}
})

Brickrouge.Datepicker.opened = []

/**
 * Closes all opened datepickers.
 */
Brickrouge.Datepicker.closeAll = function()
{
	Brickrouge.Datepicker.opened.forEach(function(datepicker) {

		datepicker.hide()

	})
}

/*
 * All opened calendars are closed when a click event occurs outside of a calendar.
 */
document.body.addEventListener('click', function(ev) {

	var target = ev.target
	, calendar = target.closest('.calendar')

	if ((calendar && calendar.closest('.popover')) || (target.closest('.calendar-editor'))) return

	Brickrouge.Datepicker.closeAll()

})

!function (Brickrouge) {

	var instances = []

	/**
	 * Automatically attach date pickers to elements matching `[data-editor="datepicker"]`
	 * when they are clicked or gain the focus.
	 *
	 * The date picker is automatically opened after it has been attached.
	 */
	document.body.addDelegatedEventListener('[data-editor="datepicker"]', 'focus', function (ev, target) {

		var uid = Brickrouge.uidOf(target)
		, picker

		if (uid in instances) return

		picker = new Brickrouge.Datepicker(Object.assign({ anchor: target }, Brickrouge.Dataset.from(target)))

		instances[uid] = picker

		picker.show()

	}, true)

} (Brickrouge)
