ICANBOOGIE_INSTANCE = dev
SERVER_PORT = 8101

vendor:
	@composer install

update:
	@composer update

autoload: vendor
	@composer dump-autoload

test: vendor
	@phpunit

server:
	@cd web && \
	ICANBOOGIE_INSTANCE=$(ICANBOOGIE_INSTANCE) php -S localhost:$(SERVER_PORT) index.php

doc:
	@mkdir -p docs
	@apigen generate \
	--source vendor/brickrouge/brickrouge/lib \
	--destination docs/ \
	--title "Brickrouge" \
	--google-analytics "UA-8673332-4" \
	--template-theme "bootstrap"

reset: cache-clear
	@rm -Rf ./vendor

.PHONY: vendor
