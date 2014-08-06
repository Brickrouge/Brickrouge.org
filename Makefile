vendor:
	@composer install

update:
	@composer update

autoload: vendor
	@composer dump-autoload

test: vendor
	@phpunit

doc:
	apigen \
	--source vendor/ \
	--destination docs/ \
	--title Brickrouge \
	--exclude "*/build/*" \
	--exclude "*/composer/*" \
	--template-config /usr/share/php/data/ApiGen/templates/bootstrap/config.neon \
	--google-analytics "UA-8673332-4"

reset: cache-clear
	@rm -Rf ./vendor

.PHONY: vendor
