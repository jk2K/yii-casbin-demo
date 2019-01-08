## Installation
```bash
cp .env.dev .env
composer dump-autoload
# run built-in web server
vendor/bin/yii serve

# access the API
curl http://localhost:8080/site/test
```

## example
```php
/** @var Casbin $casbin */
$casbin = Yii::get('casbin');
$sub = 'alice'; // the user that wants to access a resource.
$obj = 'data1'; // the resource that is going to be accessed.
$act = 'read'; // the operation that the user performs on the resource.

$enforcer = $casbin->getEnforcer();
// give user "alice1" the "read" permission for "data1" resource
$enforcer->addPermissionForUser('alice1', 'data1', 'read');
// give role "group_admin" the "read" permission for "data1" resource
$enforcer->addPermissionForUser('group_admin', 'data1', 'read');
// assigning role to user
$enforcer->addRoleForUser('alice', 'group_admin');

// access check
$result = $enforcer->enforce($sub, $obj, $act);
```
