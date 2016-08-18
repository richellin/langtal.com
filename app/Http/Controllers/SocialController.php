<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Contracts\Factory as Socialite;
use App\Events\UserWasRegistered;
class SocialController extends Controller
{
    /**
     * @var Factory
     */
    private $socialite;
    /**
     * Create social login controller instance.
     *
     * @param Socialite $socialite
     */
    public function __construct(Socialite $socialite)
    {
        $this->middleware('guest', ['only' => 'execute']);
        $this->socialite = $socialite;
        parent::__construct();
    }
    /**
     * Handle social login process.
     *
     * @param \Illuminate\Http\Request $request
     * @param string                   $provider
     * @return \App\Http\Controllers\Response
     */
    public function execute(Request $request, $provider)
    {
        if (! $request->has('code')) {
            return $this->redirectToProvider($provider);
        }
        return $this->handleProviderCallback($provider);
    }
    /**
     * Redirect the user to the Social Login Provider's authentication page.
     *
     * @param string $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    protected function redirectToProvider($provider)
    {
        return $this->socialite->driver($provider)->redirect();
    }
    /**
     * Obtain the user information from the Social Login Provider.
     *
     * @param string $provider
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function handleProviderCallback($provider)
    {
        $social_user = $this->socialite->driver($provider)->user();
        $email = $social_user->getEmail();
        $user = User::whereEmail($social_user->getEmail())->first();
        
        if($user == null) {
            $user = User::create([
                'name'  => $social_user->getName() ?: 'unknown',
                'email' => $social_user->getEmail(),
            ]);
            event(new UserWasRegistered($user));
            //event(new UserWasRegistered($user));
        }
        
        \Auth::login($user, true);
        
        $user->last_login = (new \DateTime)->format('Y-m-d H:i:s');
        $user->save();
        return redirect(url('/'));
    }
}