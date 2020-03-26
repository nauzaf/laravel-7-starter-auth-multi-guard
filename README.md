# Laravel 7 Starter Auth Multi Guard

## Get Started

get Started develoing..

1. Install vendor using

```
$ composer install
```

2. Edit (Custom Your Own) `Other Role` guard for these file

- app/Http/Controllers/Auth/LoginController
```
45 public function showOtherRoleLoginForm()
81 public function loginOtherRole(Request $request)
95 if ($this->attemptLogin($request, 'other_role')) {
96 return $this->sendLoginResponse($request, '/other_role/dashboard');
```

- app\Http\Middleware\Authenticate

```
22 return route('view.login.other.role');
```

- app\Http\Middleware\RedirectIfAuthenticated

```
25 if (Auth::guard('other_role')->check()) {
26 return redirect('/other_role/dashboard');
```

- app\Models\OtherRole (`also rename filename & class name`)

```
12 protected $table = 'otherrole';
14 protected $guard = 'other_role';
```

- config\auth.php

```
44 'other_role' => [
46 'provider' => 'other_role',
73 'other_role' => [
```

- database\migrations\2020_03_25_232310_create_otherrole_table (`also rename filename & class name`)

```
16 Schema::create('otherrole', function (Blueprint $table) {
34 Schema::dropIfExists('otherrole');  
```

- database\seeds\OtherRoleTableSeeder (`also rename filename & class name`)

```
14 DB::table('otherrole')->insert([
15 'name' => 'Other Role',
16 'email' => 'role@role.com',
17 'password' => bcrypt('super-role')
```

- resources\views\auth\login.blade

```
11 <form method="POST" action="{{ route('post.login.other.role') }}">
```

- resources\views\page\other-role\dashboard.blade.php (`rename other-role directory`)

```
8 <div class="card-header">Other Role Dashboard</div>
```

- routes\web

```
21 Route::get('/other_role/login', 'Auth\LoginController@showOtherRoleLoginForm')->name('view.login.other.role');
24 Route::post('/other_role/login', 'Auth\LoginController@loginOtherRole')->name('post.login.other.role');
34 Route::middleware(['auth:other_role'])->prefix('other_role')->group(function (){
35 Route::get('/', function(){return view('page.other-role.dashboard');})->name('other.role.dashboard');
36 Route::get('/dashboard', function(){return view('page.other-role.dashboard');})->name('other.role.dashboard');
```

3. Migrate & seed to your database

```
$ php artisan migrate
$ php artisan db:seed
```

4. Compile UI using npm (because it will load compiled vue-ui). You can custom your UI with your own css / jss by editing views and you're no need to execute this npm

```
$ npm install && npm run dev
```

5. Start dev

```
$ php artisan serve
```

Enjoy .......
