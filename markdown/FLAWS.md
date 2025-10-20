Design flaws:

- Overall, declare(strict_type=1) and strict typing could be used through the project
- Modules\Post\Http\Controllers\Backend\PostController: CheckBlacklistedWordsService use 
    - Dependency injection violation
- Modules\Post\Http\Controllers\Backend\PostController: QuickNameUpdate feature 
    - SQL injection
    - No form validation
    - Use of php global variable POST instead of laravel Request abstractions
    - (Thank you Laravel for preventing csrf token omission, i will leave that one)
- Modules\Post\Http\Controllers\Backend\PostController: SharePostToExternalApiService use
    - Hardcoded api link and credentials
    - Only covers the create case, nothing about the update or delete cases
    - Could be put into a queue to add asynchronisity to optimise performances, could be put into a post observer
- Modules\Post\Repositories\PostRepository:
    - N + 1 database query
    - Repository not instanciated
