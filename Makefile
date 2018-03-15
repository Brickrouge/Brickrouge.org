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

run:
	@cd web && \
	ICANBOOGIE_INSTANCE=$(ICANBOOGIE_INSTANCE) php -S localhost:$(SERVER_PORT) index.php

optimize: vendor
	@composer dump-autoload -oa
	@ICANBOOGIE_INSTANCE=$(ICANBOOGIE_INSTANCE) icanboogie optimize

unoptimize: vendor
	@composer dump-autoload
	@rm -f vendor/icanboogie-combined.php
	@ICANBOOGIE_INSTANCE=$(ICANBOOGIE_INSTANCE) icanboogie clear cache

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

clear-cache:
	@ICANBOOGIE_INSTANCE=$(ICANBOOGIE_INSTANCE) icanboogie clear cache

.PHONY: vendor optimize unoptimize
