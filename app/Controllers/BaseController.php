<?php

namespace App\Controllers;

use App\Models\Banner;
use App\Models\Biaya;
use App\Models\Fasilitas;
use App\Models\JenisProgram;
use App\Models\JenisProgramDetail;
use App\Models\Jurusan;
use App\Models\KontakKami;
use App\Models\Setting;
use App\Models\TipePerkuliahan;
use App\Models\User;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;
    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['my_helper'];
    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;
    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        // Preload any models, libraries, etc, here.
        $this->db = \Config\Database::connect();
        $this->db->setPrefix('lp_');

        $this->setSettings();
        $this->mBanner = new Banner();
        $this->mBiaya = new Biaya();
        $this->mFasilitas = new Fasilitas();
        $this->mJenisProgram = new JenisProgram();
        $this->mJenisProgramDetail = new JenisProgramDetail();
        $this->mJurusan = new Jurusan();
        $this->mKontakKami = new KontakKami();
        $this->mSetting = new Setting();
        $this->mTipePerkuliahan = new TipePerkuliahan();
        $this->mUser = new User();

        $this->setUser();
    }
    private function setSettings()
    {
        $settings = $this->db->table('settings')->get()->getResultArray();
        $content = [];
        foreach ($settings as $k => $v) {
            $content[$v['key']] = $v['value'];
        }
        defined('SETTINGS') or define('SETTINGS', $content);
    }
    public function setUser()
    {
        $session = session();
        if ($session->get('logged_in')) {
            $sessionUser = $session->get('user');
            $user = model('User')->asArray()->find($sessionUser->username);
            defined('USER') or define('USER', $user);
        }
    }
}
