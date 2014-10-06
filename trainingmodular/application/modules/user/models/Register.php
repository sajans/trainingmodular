<?php

class User_Model_Register extends Zend_Db_Table_Abstract {

    protected $_name = 'register';

    public function add($formData, $id = null) {
        // echo "<pre>";        var_dump($formData); exit;
        // unset($formData["submit"]);
//        $lastId = $this->insert($formData);
//        if (!$lastId) {
//            throw new Exception("Couldn't insert data into database");
//        }

        if (!$id) {
            $row = $this->createRow();
        } else {
            $row = $this->find($id)->current();
        }


        $row->first_name = $formData['first_name'];
        $row->last_name = $formData['last_name'];
        $row->email = $formData['email'];
        $row->role_id = 1;

        $row->save();
    }

    public function getAll() {
        $data = $this->select()
                ->from($this->_name);
        return $this->fetchAll($data);
    }

    public function getOne($id) {
        $data = $this->select()
                ->from($this->_name)
                ->where('id=?', $id);
        return $this->fetchRow($data)->toArray();
    }

    public function deleteUser($id) {
        $row = $this->find($id)->current();
        //  echo "<pre>";var_dump($row); exit;

        $row->delete();
    }

    
      public function userAndRole() {
      $select = $this->select()->setIntegrityCheck(false)//by default true so can't join table.
      ->from(array("r" => "register"), array("r.*"))
      ->joinLeft(array("ro" => "roll"), "ro.id=r.role_id", array("ro.role"))
      ->order('r.id desc'); // query order
      //  ->where("ro.id=?", 1)
      // ->orWhere("r.id=?", 3);//or where
      //echo $select->assemble();//query print
      return $this->fetchAll($select);
      }
     
    /*
    public function userAndRole() { //raw sql query fetch
        $select = " select * from register ";
        $obj = Zend_Db_Table::getDefaultAdapter();
        $tee = $obj->query($select);
        return $tee->fetchAll();
    }
    */
}
