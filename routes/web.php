<?php

Auth::routes();

Route::resource('photos', 'PhotoController');
Route::resource('article-types', 'ArticleTypeController');

#region oAuth2.0 token
Route::get('redirect', function () {
	$query = http_build_query([
		'client_id' => '1',
		'redirect_uri' => env('APP_URL') . '/articles',
		'response_type' => 'code',
		'scope' => '',
	]);

	return redirect('/oauth/authorize?' . $query);
});

Route::get('redirect_home', function () {

	$query = http_build_query([
		'client_id' => '1',
		'redirect_uri' => env('APP_URL') . '/home',
		'response_type' => 'code',
		'scope' => '',
	]);

	return redirect('/oauth/authorize?' . $query);
});

Route::get('redirect_callback', function () {
	$query = http_build_query([
		'client_id' => 2,
		'redirect_uri' => env('APP_URL') . '/callback',
		'response_type' => 'code',
		'scope' => '',
	]);

	return redirect('/oauth/authorize?' . $query);
});

Route::get('callback', function (\Illuminate\Http\Request $request) {
	$http = new GuzzleHttp\Client();
	$response = $http->post(env('APP_URL') . '/oauth/token', [
		'form_params' => [
			'grant_type' => 'authorization_code',
			'client_id' => '2',
			'client_secret' => 'tSsBsberWnXfosQGU5az3H3HQXTHJQ7dAE7x4EWT',
			'redirect_uri' => env('APP_URL') . '/callback',
			'code' => $request->code,
		],
	]);
	return json_decode((string) $response->getBody(), true);
});

Route::get('refreshToken', function () {

	$user = \App\User::where('id', 2)->first();
//    dump($user->access_token);
	//    dump($user);
	//    dump($user->refresh_token);exit;

	$http = new GuzzleHttp\Client();

	$response = $http->post(env('APP_URL') . '/oauth/token', [
		'form_params' => [
			'grant_type' => 'refresh_token',
			'refresh_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijg3MGI3ZWQ5ZWE3NGE2MWM0ODhhZDBiYzRkZjQzMGM0MTc0YWY4OTcxNGJlMjY5MzA3NDFmYjIwNTFiMzdhYTRiM2FhMDRiNDNiYjJlMzgzIn0.eyJhdWQiOiIzIiwianRpIjoiODcwYjdlZDllYTc0YTYxYzQ4OGFkMGJjNGRmNDMwYzQxNzRhZjg5NzE0YmUyNjkzMDc0MWZiMjA1MWIzN2FhNGIzYWEwNGI0M2JiMmUzODMiLCJpYXQiOjE0OTYwNjg3NzksIm5iZiI6MTQ5NjA2ODc3OSwiZXhwIjoxNTI3NjA0Nzc5LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.xekXM8nvvDn0cnsEOgNOBIsSXJtY_0o2DLHHfNRBbMQ7wvKRXw-qyCvEarnwBQNKAO_36tRSuIKGRUAtTbdP5cr2fef7-72MK1ktNZ_xUMkr8sWClpL-aacjjHk0TG3ao6EVDjbZr07UshOXmmEoUX8PAGfKH_uAL7PDGTXdRJ68hOpVzFuA1Ke7p3BCjEpIqHf3h80C3VooCGiIZdMrQI8c3AxsaSAhICcKTN6CbrZIZnT6sgwr1-OXVFU1WqmjMWR3FqzQY41YS_JzoDyKeDveJOzowUPxD2d8_nJfN8tAi2ntKlARVyQCeiLkpkl3o3kHR6ej8eWF4P4fNzI3wCFTJ3SghP0kczF7-N1MkJjXyjJZh4U1_-UXsHFVXn3fvXixDBIygILFamAVwHUOCc3BVIIERdv81eUxWQXjyPHU0WeHTvjuCGU7O8jjf6sYw9KlSFy-6aiK8-U5iHCx9Wl8fMKOT2qHcwxnr5heGCu886tUOLNGokjkBIqq6inoZQnStiX3jDze7GVdiXP7a6cPTnxr0odBG9JVx9GP5tFEjj58mB5aSYF_uTWZwEVrKJ-iVEQ0930dFp7ofk4_9bnSnTWxqBu5iQ4dk98wlfmlWFTyhzFIqf9CMLXdRJ19YselryCzH3mD_EfCHBMfrXWGytDTbNB97N1ZzfmUXl4',
			'client_id' => 5,
			'client_secret' => 'nnAzR3Is4IsQTrSmn6Yk78uKDgiGjWQ0wQ8bGJDG',
			'scope' => '',
		],
	]);

	return json_decode((string) $response->getBody(), true);
});

Route::get('passwordToken', function (\Illuminate\Http\Request $request) {

	$result = [
		'status' => 0,
		'message' => '获取失败',
		'data' => [],
	];

	$email = $request->get('email');
	$password = $request->get('password');

	$validator = \Validator::make($request->all(), [
		'email' => ['required'],
		'password' => ['required'],
	]);
	if ($validator->fails()) {
		$result['message'] = $validator->messages()->getMessageBag();
	} else if(Auth::attempt(['email' => $email, 'password' => $password])){

		$user = \App\Models\UserModel::where('email', $request->get('email'))
            ->first();

		if (is_null($user)) {
			$result['data'] = '';
			$result['message'] = 'email或者密码错误';
		} else {

			$token = $user->createToken(env('APP_URL'))->accessToken;
			$result['data'] = [
				'token' => $token,
			];
			$result['status'] = 1;
		}

		/*$http = new GuzzleHttp\Client();

			$domain = env('APP_URL');
			$domain = str_replace(':5000', '', $domain);

			try {
				$response = $http->post($domain . '/oauth/token', [
					'form_params' => [
						'grant_type' => 'password',
						'client_id' => '5',
						'client_secret' => 'nnAzR3Is4IsQTrSmn6Yk78uKDgiGjWQ0wQ8bGJDG',
						'username' => $user->email,
						'password' => $request->get('password'),
						'scope' => '',
					],
				]);
				$result['status'] = 1;
				$result['data'] = json_decode((string) $response->getBody(), true);
			} catch (Exception $e) {
				$result['data'] = "";
				$result['message'] = "email或密码错误";
		*/
	}

	return $result;
});

Route::get('implicitGrantToken', function () {

	$query = http_build_query([
		'client_id' => '27',
		'redirect_uri' => env('APP_URL') . '/home',
		'response_type' => 'token',
		'scope' => '',
	]);

	return redirect(env('APP_URL') . '/oauth/authorize?' . $query);
});

Route::get('clientCredentialsGrantToken', function () {

	$http = new GuzzleHttp\Client();
	$response = $http->post(env('APP_URL') . '/oauth/token', [
		'form_params' => [
			'grant_type' => 'client_credentials',
			'client_id' => 27,
			'client_secret' => '672magxcDiF6cg4eAxFLzu7XSEr3ADrk7sz7dX7T',
			'scope' => '',
		],
	]);

	return json_decode((string) $response->getBody(), true);
});

Route::get('getToken', function (\Illuminate\Http\Request $request) {

	$data = [
		'status' => 500,
		'token' => '',
	];
	$key = $request->get('key');
	if ($key == md5(env('APP_KEY'))) {
		$user = \App\User::where('id', env('TEST_USER_ID'))->first();
		$token = $user->createToken("http://web.local")->accessToken;
		$data = [
			'status' => 200,
			'token' => $token,
		];
	} else if (!Auth::guest()) {
		$token = Auth::getUser()->createToken(env('APP_URL'))->accessToken;
		$data = [
			'status' => 200,
			'token' => $token,
		];
	} else if (!Auth::guard('admin')->guest()) {
		$token = Auth::guard('admin')->getUser()->createToken(env('APP_URL'))->accessToken;
		$data = [
			'status' => 200,
			'token' => $token,
		];
	}
	return $data;
});
#endregion

Route::get('/', 'IndexController@index');


Route::get('md5', function (\Illuminate\Http\Request $request) {
	return md5($request->get('key'));
});



Route::get('queue_test', function (\Illuminate\Http\Request $request) {

	$id = $request->get('id');
	$user = \App\User::find($id);
	$job = (new \App\Jobs\TestJob($user));

	\dispatch($job->onConnection('redis')->delay(\Carbon\Carbon::now()->addSeconds(30)));
});

#region 后台管理
Route::group([], function () {

	Route::get('/admin', 'Admin\DashboardController@index')->name('admin.index');
	Route::get('/admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/admin/login', 'Admin\LoginController@login');
	Route::get('/admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
	Route::post('/admin/logout', 'Admin\LoginController@logout');
	Route::get('/admin/dashboard', 'Admin\DashboardController@index');
	Route::get('/admin/test', 'Admin\LoginController@test');
	Route::get('/admin/dash', 'Admin\DashboardController@index')->name('admin.home');

	//文章
	Route::get('/admin/articleType', 'Admin\ArticleTypeController@index')->name('admin.articleType');
	Route::get('/admin/article-type-create', 'Admin\ArticleTypeController@create')->name('admin.articleTypeCreate');
	Route::get('/admin/article/index', 'Admin\ArticleController@index')->name('admin.article');
	Route::get('/admin/article/create', 'Admin\ArticleController@create')->name('admin.article.create');

	//配置
	Route::get('/admin/config/create', 'Admin\ConfigController@create')->name('admin.config.create');
	Route::get('/admin/config/edit', 'Admin\ConfigController@edit')->name('admin.config.edit');

	//留言
	Route::get('/admin/guestbook/index', 'Admin\GuestbookController@index')->name('admin.guestbook.index');
	//留言
	Route::get('/admin/survey/index', 'Admin\SurveyController@index')->name('admin.survey.index');
});
#region