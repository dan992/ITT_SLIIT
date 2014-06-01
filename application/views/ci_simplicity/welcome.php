	<h1>Welcome to CodeIgniter Simplicity!</h1>

	<div id="body">
		<p>This is just an example view of the home page. You can easily load whatever html file you like here with a normal codeigniter view.</p>
	</div>
	
	<div>
		<h2>Code Behind this page</h2>
		<pre>
&lt?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Example extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->_init();
$this->index();
	}

	private function _init()
	{
		$this->output->set_template('template01');

			$this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
		$this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
		$this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
	}

	public function index()
	{
		$this->load->view('ci_simplicity/createProject');
	}	
	...
}	
		</pre>
	</div>