<?php


namespace App\Http\Repositories;


use App\Http\Interfaces\AdminRepositoryInterface;
use App\Models\Admin;
use Illuminate\Support\Facades\Cookie;

class AdminRepository implements AdminRepositoryInterface
{
    private $admin;

    /**
     * AdminRepository constructor.
     *
     * @param Admin $admin
     */
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    /**
     * Get admin by username and password.
     *
     * @param $username
     * @param $password
     * @return mixed
     */
    public function getAdmin($username, $password)
    {
        // TODO: Implement getAdmin() method.
        $admin = $this->admin
            ->where('username', $username)
            ->where('password', md5($password))
            ->first();

        return $admin;
    }

    /**
     * Make sessions to the admin.
     *
     * @param Admin $admin
     */
    public function generateSession(Admin $admin)
    {
        // TODO: Implement generateSession() method.
        $this->updateLoginDate($admin);
        session()->put('eta.admin.id', $admin->id);
        session()->put('eta.admin.name', $admin->name);
        session()->put('eta.admin.lang', $admin->lang);
        session()->put('eta.admin.username', $admin->username);
        session()->put('eta.admin.token', $admin->remember_token);
        session()->put('eta.admin.roles', $admin->roles
            ->pluck("name")
            ->toArray()
        );
        session()->save();
    }

    /**
     * Make cookie to the admin.
     *
     * @param Admin $admin
     */
    public function generateCookie(Admin $admin)
    {
        // TODO: Implement generateCookie() method.
        Cookie::queue(cookie()->forever("ETA-Admin", $admin->remember_token));
    }

    /**
     * Get the admin by cookie.
     *
     * @return mixed
     */
    public function getByCookie()
    {
        // TODO: Implement getAdminByCookie() method.
        $admin = $this->admin
            ->where("remember_token", decrypt(Cookie::get("ETA-Admin"), false))
            ->first();

        return $admin;
    }

    /**
     * Delete cookie for the admin.
     */
    public function removeCookie()
    {
        // TODO: Implement removeCookie() method.
        Cookie::queue(cookie()->forget("ETA-Admin"));
    }

    /**
     * Update the admin.
     *
     * @param Admin $admin
     */
    public function updateLoginDate(Admin $admin)
    {
        if (is_null($admin->remember_token))
            $admin->remember_token = hash_hmac("sha256",md5(microtime(true).mt_Rand()),bcrypt($admin->email));
        $admin->last_login = date("Y-m-d");
        $admin->save();
    }
}
