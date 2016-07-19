
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
 * CalendarMonth
 */
!function (Brickrouge, Subject) {

	/**
	 * @param {Date} date
	 *
	 * @event Brickrouge.Calendar#update
	 * @property {Date} date
	 * @property {Element} element
	 */
	const UpdateEvent = Subject.createEvent(function (date, element) {

		this.date = date
		this.element = element

	})

	/**
	 * @param {Date} date
	 *
	 * @event Brickrouge.Calendar#create
	 * @property {Date} date
	 * @property {Element} element
	 */
	const ChangeEvent = Subject.createEvent(function (date, element) {

		this.date = date
		this.element = element

	})

	const DEFAULT_OPTIONS = {

		date: null,
		dontFollowOverlap: false,
		noWeekNumber: false,
		noInput: false

	}

	/**
	 * A calendar month.
	 *
	 * @property element Element The container element.
	 * @property date Date A date in the month to render.
	 * @property now Date Current date at the initialization of the object.
	 * @property options
	 */
	class Month extends Brickrouge.mixin(Object, Subject)
	{
		/**
		 * Initialize the {@link element} and {@link now} properties.
		 *
		 * If the `dontFollowOverlap` option is not true an event is added to the element to follow
		 * overlap days.
		 *
		 * @param {Element} el If the container element is a `TABLE` its `TBODY` element is used
		 * instead.
		 *
		 * @param options
		 */
		constructor(el, options)
		{
			super()

			this.element = el
			this.options = Object.assign({}, DEFAULT_OPTIONS, options)

			if (this.element.tagName == 'TABLE')
			{
				this.element = this.element.querySelector('tbody')
			}

			this.now = new Date()
			this.date = null

			this.element.addDelegatedEventListener('.calendar-day', 'click', this.onCalendarDayClick.bind(this))
			this.element.addEventListener('keydown', this.onKeyDown.bind(this), true)

			this.setDate(this.options.date || this.now)
		}

		/**
		 * A day was clicked.
		 *
		 * @param {MouseEvent} ev
		 * @param {Element} el
		 */
		onCalendarDayClick(ev, el)
		{
			this.element.focus()

			if (!this.options.dontFollowOverlap && el.classList.contains('overlap'))
			{
				this.setDate(el.getAttribute('data-date'))
				this.notifyUpdate(this.date)

				return
			}

			if (!this.options.noInput && !el.classList.contains('disabled'))
			{
				this.setDate(el.getAttribute('data-date'))
				this.notifyChange(this.date)
			}
		}

		/**
		 * @param {KeyboardEvent} ev
		 */
		onKeyDown(ev)
		{
			let date = null
			let unit = 'day'

			if (ev.altKey)
			{
				unit = 'year'
			}
			else if (ev.shiftKey)
			{
				unit = 'month'
			}

			switch (ev.key)
			{
				case 'ArrowLeft':
					date = Date.from(this.date).decrement(unit, 1)
					break
				case 'ArrowRight':
					date = Date.from(this.date).increment(unit, 1)
					break
				case 'ArrowUp':
					date = Date.from(this.date).decrement('day', 7)
					break
				case 'ArrowDown':
					date = Date.from(this.date).increment('day', 7)
					break
				case 'PageUp':
					date = Date.from(this.date).decrement(ev.shiftKey ? 'year' : 'month', 1)
					break
				case 'PageDown':
					date = Date.from(this.date).increment(ev.shiftKey ? 'year' : 'month', 1)
					break
				case 't':
					date = new Date()
					break
				case 'Enter':
				case ' ':
					this.notifyChange(this.date)
					break
				default:
					switch (ev.code)
					{
						case 'KeyM':
							date = Date.from(this.date)[ev.shiftKey ? 'decrement' : 'increment']('month', ev.altKey ? 10 : 1)
							break
						case 'KeyY':
							date = Date.from(this.date)[ev.shiftKey ? 'decrement' : 'increment']('year', ev.altKey ? 10 : 1)
							break
						default:
							return
					}
			}

			ev.stopPropagation()
			ev.preventDefault()

			if (date) {
				this.setDate(date)
				this.notifyUpdate(this.date)
			}
		}

		/**
		 * Fires `NOTIFY_UPDATE` with the specified arguments.
		 *
		 * @protected
		 *
		 * @param {Date} date
		 */
		notifyUpdate(date)
		{
			this.notify(new UpdateEvent(date))
		}

		/**
		 * Fires `NOTIFY_CHANGE` with the specified arguments.
		 *
		 * @protected
		 *
		 * @param {Date} date
		 */
		notifyChange(date)
		{
			this.notify(new ChangeEvent(date))
		}

		setDate(date)
		{
			this.date = Date.from(date)
			this.render(this.date)
		}

		render(date)
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
		}

		renderWeek(date)
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
		}

		renderDay(date)
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

		/**
		 * @param {Function} callback
		 */
		observeChange(callback)
		{
			this.observe(ChangeEvent, callback)
		}

		/**
		 * @param {Function} callback
		 */
		observeUpdate(callback)
		{
			this.observe(UpdateEvent, callback)
		}
	}

	Object.defineProperties(Month, {

		EVENT_CHANGE: { value: ChangeEvent },
		EVENT_UPDATE: { value: UpdateEvent }

	})

	return Brickrouge.CalendarMonth = Month

} (Brickrouge, Brickrouge.Subject)

/**
 * Brickrouge.CalendarEditor
 */
!function (Brickrouge, Subject, Popover) {

	const ACTION_OK = 'ok'
	const ACTION_CANCEL = 'cancel'

	/**
	 * @param {Date} date
	 *
	 * @event Brickrouge.Calendar#update
	 * @property {string} action
	 * @property {object} payload
	 */
	const ActionEvent = Subject.createEvent(function (action, payload) {

		this.action = action
		this.payload = payload

	})

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
	let Editor = new Class({

		Implements: [ Options, Subject ],

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

			this.popover = Popover.from({

				actions: 'boolean',
				content: content,
				placement: 'below'

			})

			this.popover.element.classList.add('calendar-editor')

			this.popover.observe(Popover.EVENT_ACTION, function(ev) {

				if (ev.action == ACTION_OK)
				{
					this.ok()
				}
				else if (ev.action == ACTION_CANCEL)
				{
					this.cancel()
				}

			}.bind(this))
		},

		setDate: function(date)
		{
			if (this.yearControl)
			{
				this.yearControl.value = date.getFullYear()
			}

			if (this.monthControl)
			{
				this.monthControl.value = date.getMonth() + 1
			}

			if (this.dayControl)
			{
				this.dayControl.value = date.getDate()
			}
		},

		ok: function()
		{
			var year = null
			var month = null
			var day = null

			if (this.yearControl)
			{
				year = this.yearControl.value
			}

			if (this.monthControl)
			{
				month = this.monthControl.value
			}

			if (this.dayControl)
			{
				day = this.dayControl.value
			}

			this.notifyAction(ACTION_OK, { year: year, month: month, day: day })
		},

		cancel: function()
		{
			this.notifyAction(ACTION_CANCEL)
		},

		notifyAction: function(action, payload)
		{
			this.notify(new ActionEvent(action, payload))
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

	Object.defineProperties(Editor, {

		ACTION_OK:     { value: ACTION_OK },
		ACTION_CANCEL: { value: ACTION_CANCEL },
		EVENT_ACTION:  { value: ActionEvent }

	})

	return Brickrouge.CalendarEditor = Editor

} (Brickrouge, Brickrouge.Subject, Brickrouge.Popover)

/**
 * Brickrouge.Calendar
 */
!function (Brickrouge, Month, Editor) {

	/**
	 * @param {Date} date
	 *
	 * @event Brickrouge.Calendar#update
	 * @property {Date} date
	 */
	const UpdateEvent = Brickrouge.Subject.createEvent(function (date) {

		this.date = date

	})

	/**
	 * @param {Date} date
	 *
	 * @event Brickrouge.Calendar#create
	 * @property {Date} date
	 */
	const ChangeEvent = Brickrouge.Subject.createEvent(function (date) {

		this.date = date

	})

	/**
	 * A calendar.
	 *
	 * @property editors Object The date editors array.
	 * @property element Element The element used to display the calendar.
	 * @property month Month The object used to display a month of the calendar.
	 * @property monthName Element|null The element used to display the name of the month.
	 * @property yearName Element|null The element used to display the name of the year.
	 */
	let Calendar = new Class({

		Implements: [ Options, Brickrouge.Subject ],

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
			this.monthName = this.element.querySelector('.month .name')
			this.yearName = this.element.querySelector('.year .name')
			this.month = this.createMonth(this.element.querySelector('tbody'), {

				noWeekNumber: this.options.noWeekNumber

			})

			this.month.observeUpdate(ev => {

				let date = ev.date

				this.renderMonthName(date)
				this.renderYearName(date)
				this.notifyUpdate(date)

			})

			this.month.observeChange(ev => {

				let date = ev.date

				this.renderMonthName(date)
				this.renderYearName(date)
				this.notifyChange(date)

			})

			this.setDate(this.options.date || 'now')
		},

		createMonth: function(el, options)
		{
			return new Month(el, options)
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

				this.edit('my', this.month.date, this.element.querySelector('caption') || this.element)
			}
		},

		notifyUpdate: function(date)
		{
			this.notify(new UpdateEvent(date))
		},

		notifyChange: function(date)
		{
			this.notify(new ChangeEvent(date))
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
			const editor = this.getEditor(type)

			editor.setDate(date)
			editor.attachAnchor(anchor)
			editor.show()
			editor.focus()
		},

		getEditor: function(type)
		{
			if (this.editors[type]) return this.editors[type]

			var editor = new Editor({

				type: type

			})

			editor.observe(Editor.EVENT_ACTION, function(ev) {

				let action = ev.action
				let params = ev.payload

				if (action == Editor.ACTION_OK)
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
				else if (action == Editor.ACTION_CANCEL)
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

	Object.defineProperties(Calendar, {

		EVENT_UPDATE: { value: UpdateEvent },
		EVENT_CHANGE: { value: ChangeEvent },

		from:         { value: from }

	})

	/**
	 * Creates a calendar element according to options:
	 *
	 * - caption: A `caption` element or one of the following special values: '+ym',
	 * 'ym'.
	 * - noDayNames: The day names element is not created.
	 * - noWeekNumber: The elements use to display the week number are not created.
	 */
	function from(options)
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

		return new Calendar(el, options)
	}

	return Brickrouge.Calendar = Calendar

} (Brickrouge, Brickrouge.CalendarMonth, Brickrouge.CalendarEditor)

/*
 * DatePicker
 */

!function (Brickrouge, Calendar, Popover) {

	let Datepicker = new Class({

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

			calendar.observe(Calendar.EVENT_CHANGE, function(ev) {

				var anchor = this.anchor

				if (anchor.tagName == 'INPUT')
				{
					anchor.set('value', ev.date.format('%Y-%m-%d'))
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

	const opened = []

	Datepicker.opened = opened

	/**
	 * Closes all opened datepickers.
	 */
	Datepicker.closeAll = function()
	{
		opened.forEach(function(datepicker) {

			datepicker.hide()

		})
	}

	Brickrouge.Datepicker = Datepicker

} (Brickrouge, Brickrouge.Calendar, Brickrouge.Popover)

/*
 * Close opened date picker when click is outside of one.
 */
!function (closeAll) {

	/*
	 * All opened calendars are closed when a click event occurs outside of a calendar.
	 */
	document.body.addEventListener('click', function (ev) {

		const target = ev.target
		const calendar = target.closest('.calendar')

		if ((calendar && calendar.closest('.popover'))
		|| (target.closest('.calendar-editor'))) return

		closeAll()

	})

} (Brickrouge.Datepicker.closeAll)


!function (Brickrouge, DatePicker) {

	const instances = []

	/**
	 * Automatically attach date pickers to elements matching `[data-editor="datepicker"]`
	 * when they are clicked or gain the focus.
	 *
	 * The date picker is automatically opened after it has been attached.
	 */
	document.body.addDelegatedEventListener('[data-editor="datepicker"]', 'focus', function (ev, target) {

		const uid = Brickrouge.uidOf(target)

		if (uid in instances) return

		const picker = new DatePicker(Object.assign({ anchor: target }, Brickrouge.Dataset.from(target)))

		instances[uid] = picker

		picker.show()

	}, true)

} (Brickrouge, Brickrouge.Datepicker)
