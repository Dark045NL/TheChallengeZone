<?php   

    function find_all_subjects() {
        global $db;
        
        $sql = "SELECT * FROM subjects ";
        $sql .="ORDER BY quantity ASC";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_subject_by_id($id) {
        global $db;

        $sql = "SELECT * FROM subjects ";
        $sql .= "WHERE id='" . $id . "'";
        $result = mysqli_query ($db, $sql);
        confirm_result_set($result);
        $subject = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $subject;
    }

    function validate_subject($subject) {

      $errors = [];
      
      // product
      if(is_blank($subject['product'])) {
        $errors[] = "Name cannot be blank.";
      }elseif(!has_length($subject['product'], ['min' => 2, 'max' => 255])) {
        $errors[] = "Name must be between 2 and 255 characters.";
      }
    
      // quantity
      // Make sure we are working with an integer
      //$postion_int = (int) $subject['quantity'];
      //if($postion_int <= 0) {
        //$errors[] = "quantity must be greater than zero.";
      //}
      //if($postion_int > 999) {
        //$errors[] = "quantity must be less than 999.";
      //}
    
      // prijs
      // Make sure we are working with a string
      //$visible_str = (string) $subject['prijs'];
      //if(!has_inclusion_of($visible_str, ["0","1"])) {
       // $errors[] = "Visible must be true or false.";
      //}
    
      return $errors;
    }      

    function insert_subject($subject){
        global $db;

        $errors = validate_subject($subject);
        if(!empty($errors)){
          return $errors;
        }
        
        $sql = "INSERT INTO subjects ";
        $sql .= "(product, quantity, prijs) ";
        $sql .= "VALUES (";
        $sql .= "'" . $subject['product'] . "',";
        $sql .= "'" . $subject['quantity'] . "',";
        $sql .= "'" . $subject['prijs'] . "'";
        $sql .= ")";
        $result = mysqli_query($db, $sql);
        
        if($result) {
        return true;
        
        } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
        }
    }

    function update_subject($subject) {
        global $db;
    
        $errors = validate_subject($subject);
        if(!empty($errors)){
          return $errors;
        }

        $sql = "UPDATE subjects SET ";
        $sql .= "product='" . $subject['product'] . "', ";
        $sql .= "quantity='" . $subject['quantity'] . "', ";
        $sql .= "prijs='" . $subject['prijs'] . "' ";
        $sql .= "WHERE id='" . $subject['id'] . "' ";
        $sql .= "LIMIT 1";
    
        $result = mysqli_query($db, $sql);
        // For UPDATE statements, $result is true/false
        if($result) {
          return true;
        } else {
          // UPDATE failed
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
        }
    
      }
?>