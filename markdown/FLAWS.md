Everything is debatable.

Here are some of the most problematic design flaws listed:

- Backend\PostController : CheckBlacklistedWordsService use : 
    - Dependency injection violation
- Backend\PostController : QuickNameUpdate feature 
    - SQL injection
    - No form validation
    - Use of php global variable POST instead of laravel request abstractions
    - (Thank you Laravel for preventing csrf token omission, i will leave that one)
