<?php
class User
{
    private $_db, $_data, $_sessionName;
    public $_isLoggedIn = false;

    public function __construct($user = null)
    {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('session/session_name');

        if (!$user) {
            if (Session::exists($this->_sessionName)) {
                $user = Session::get($this->_sessionName);
                if ($this->find($user)) {
                    $this->_isLoggedIn = true;
                }
            }
        } else {
            $this->find($user);
        }
    }

    public function create($fields = array())
    {
        if (!$this->_db->insert("users", $fields)) {
            throw new Exception("meci mai prst");
        }
    }

    public function find($user = null)
    {
        if ($user) {
            $field = (is_numeric($user)) ? 'id' : 'email';
            $data = $this->_db->get('users', array($field, "=", $user));

            if ($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    public function login($email = null, $parola = null)
    {
        $user = $this->find($email);
        
        if ($user) {
            if (trim($this->data()->password) === trim(hash("sha256", trim($parola).trim($this->data()->salt))) ) {
                Session::put($this->_sessionName, $this->data()->id);

                return true;
            }
        }

        return false;
    }


    public function data()
    {
        return $this->_data;
    }

    public function isLoggedIn()
    {
        return $this->_isLoggedIn;
    }

    public function logout()
    {
        Session::delete($this->_sessionName);
        $this->_isLoggedIn = false;
        Redirect::to('index.php');
    }
}
