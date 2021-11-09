# JIRA Rest API Client
A PHP client for JIRA Rest Api

## Install
Via Composer

```shell
$ composer require doppiogancio/jira-rest-api-client
```

## Requirements
* This version requires a minimum PHP version 7.4
* The JIRA domain (i.e. https://my-project.atlassian.net/)
* Email and [token](https://developer.atlassian.com/cloud/jira/platform/basic-auth-for-rest-apis/)

## The JIRA Rest API Client
So far the client offers only functionalities only for two components:
1. issue `$jira->issue()`
2. release `$jira->release()`

Every request is asynchronous, so use the **wait()** to get the results
```php
$mergeRequests = $gitlab->mergeRequest()->list()->wait();
```

## How to use the client
```php
use DoppioGancio\GitLab\Client;
use DoppioGancio\GitLab\Domain\MergeRequest;
use GuzzleHttp\Client as GuzzleClient;

$client = new GuzzleClient([
    'base_uri' => 'https://my-domain.atlassian.net/',
    'auth' => [
        'user.name@my-domain.com',
        'my-token'
    ]
]);

$jira = new Client($client);

```

### Issues

```php
$issues = $jira->issue()->search()->wait();

// will return
DoppioGancio\Jira\Domain\IssueSearchResult Object
(
    [expand:DoppioGancio\Jira\Domain\IssueSearchResult:private] => schema,names
    [total:DoppioGancio\Jira\Domain\IssueSearchResult:private] => 17644
    [issues:DoppioGancio\Jira\Domain\IssueSearchResult:private] => Array
        (
            [0] => DoppioGancio\Jira\Domain\Issue Object
                (
                    [expand:DoppioGancio\Jira\Domain\Issue:private] => operations,customfield_10504.requestTypePractice,versionedRepresentations,editmeta,changelog,renderedFields
                    [id:DoppioGancio\Jira\Domain\Issue:private] => 20496
                    [self:DoppioGancio\Jira\Domain\Issue:private] => https://my-domain.atlassian.net/rest/api/3/issue/20496
                    [key:DoppioGancio\Jira\Domain\Issue:private] => VII-161
                )

            [1] => DoppioGancio\Jira\Domain\Issue Object
                (
                    [expand:DoppioGancio\Jira\Domain\Issue:private] => operations,customfield_10504.requestTypePractice,versionedRepresentations,editmeta,changelog,renderedFields
                    [id:DoppioGancio\Jira\Domain\Issue:private] => 20495
                    [self:DoppioGancio\Jira\Domain\Issue:private] => https://my-domain.atlassian.net/rest/api/3/issue/20495
                    [key:DoppioGancio\Jira\Domain\Issue:private] => VII-160
                )

```

### Releases
```php
$releases = $jira->release()->list()->wait();

// will return
DoppioGancio\Jira\Domain\ReleaseResults Object
(
    [self:DoppioGancio\Jira\Domain\ReleaseResults:private] => https://my-domain.atlassian.net/rest/api/3/project/PM/version?maxResults=50&startAt=0
    [total:DoppioGancio\Jira\Domain\ReleaseResults:private] => 246
    [values:DoppioGancio\Jira\Domain\ReleaseResults:private] => Array
        (
            [0] => DoppioGancio\Jira\Domain\ReleaseResult Object
                (
                    [self:DoppioGancio\Jira\Domain\ReleaseResult:private] => https://my-domain.atlassian.net/rest/api/3/version/10434
                    [id:DoppioGancio\Jira\Domain\ReleaseResult:private] => 10434
                    [name:DoppioGancio\Jira\Domain\ReleaseResult:private] => 2021-01-18.1
                    [archived:DoppioGancio\Jira\Domain\ReleaseResult:private] => 
                    [released:DoppioGancio\Jira\Domain\ReleaseResult:private] => 1
                )

            [1] => DoppioGancio\Jira\Domain\ReleaseResult Object
                (
                    [self:DoppioGancio\Jira\Domain\ReleaseResult:private] => https://my-domain.atlassian.net/rest/api/3/version/10429
                    [id:DoppioGancio\Jira\Domain\ReleaseResult:private] => 10429
                    [name:DoppioGancio\Jira\Domain\ReleaseResult:private] => 2020-12-29.1
                    [archived:DoppioGancio\Jira\Domain\ReleaseResult:private] => 
                    [released:DoppioGancio\Jira\Domain\ReleaseResult:private] => 1
                )


```