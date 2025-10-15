# Contribution notes

PHPStan checks:
```shell
vendor/bin/phpstan analyse vendor/oktoplus/pimcore-process-manager -c vendor/oktoplus/pimcore-process-manager/phpstan.neon
```
PHP CS Fixer checks:

```shell
vendor/bin/php-cs-fixer fix dev/bundles/oktoplus/pimcore-process-manager/ --config vendor/oktoplus/pimcore-process-manager/.php-cs-fixer.dist.php --dry-run --diff
```