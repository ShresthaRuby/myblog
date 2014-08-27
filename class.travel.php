<?php

class travel {

    private $host = "localhost";
    private $db = "travel_db";
    private $user = "root";
    private $pass = "";
    private $mysqli;

    function __construct() {
        $this->mysqli = new MySQLi($this->host, $this->user, $this->pass, $this->db);
        if ($this->mysqli->error) {
            echo $this->mysqli->error;
        } else {
            //echo "connected to db";
        }
    }

    //<!-- ************************************ Slider functions start here **************************************** -->





    function upload_slider_image() {
        if ($_FILES['slider_image']['size'] > 0) {
            $dir = '../images/slider_images';
            $filename1 = $_FILES['slider_image']['name'];
            $srcfile = $_FILES['slider_image']['tmp_name'];
            $targetfile = $dir . '/' . $filename1;
            if (move_uploaded_file($srcfile, $targetfile)) {
                return $filename1;
            } else {
                //what's wrong over here :D
                return $filename1;
            }
        }
    }

    function add_slider() {
        $title = $_POST['title'];
        $slider_image = $this->upload_slider_image();
        $date = $_POST['date'];
        $short_news = $_POST['short_news'];
        $details = $_POST['details'];
        $publish = $_POST['publish'];
        $link = $_POST['link'];
        $sql = "INSERT INTO slider (title,slider_image,date,short_news,details,publish,link) VALUES ('$title','$slider_image','$date','$short_news','$details','$publish','$link')";
        $this->mysqli->query($sql);
        if ($this->mysqli->error) {
            echo "Records were not added";
        } else {
            echo "<script language='javascript'>alert('New Slider added successfully');</script>";
        }
    }

// end of the add news class

    function get_slider() {
        $sql = "SELECT * FROM slider";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

//end of get_record class

    function get_featured_slider() {
        $sql = "SELECT * FROM slider WHERE publish='1'";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

//end of get_record class

    function get_single_slider($pid) {
        $sql = "SELECT * FROM slider WHERE id='$pid'";
        $res = $this->mysqli->query($sql);
        return $res->fetch_array(MYSQLI_ASSOC);
    }

    function update_slider($pid) {
        $title = $_POST['title'];
        $slider_image = $this->upload_slider_image();
        $date = $_POST['date'];
        $short_news = $_POST['short_news'];
        $details = $_POST['details'];
        $publish = $_POST['publish'];
        $link = $_POST['link'];
        if (!empty($slider_image)) {
            $sql = "UPDATE slider SET title='$title',slider_image='$slider_image',date='$date',short_news='$short_news',details='$details',publish='$publish',link='$link'	WHERE id='$pid'";
        } else {
            $sql = "UPDATE slider SET title='$title',date='$date',short_news='$short_news',details='$details',publish='$publish',link='$link' WHERE id='$pid'";
        }
        $this->mysqli->query($sql);
        if ($this->mysqli->error) {
            echo "Records were not added";
        } else {
            echo "<script language='javascript'>alert('New Slider added successfully');</script>";
        }
    }

// end of the add news class

    function delete_slider($pid) {
        $sql = "DELETE FROM slider WHERE id='$pid'";
        $this->mysqli->query($sql);
    }

//<!-- ************************************Slider functions start here**************************************** -->	


    /*     * *************************** Page  Function starts here ******************************************************************* */
    function upload_page_image() {
        if ($_FILES['page_image']['size'] > 0) {
            $dir = '../images/page_images';
            $filename1 = $_FILES['page_image']['name'];
            $srcfile = $_FILES['page_image']['tmp_name'];
            $targetfile = $dir . '/' . $filename1;
            if (move_uploaded_file($srcfile, $targetfile)) {
                return $filename1;
            } else {
                return $filename1;
            }
        }
    }

    function add_page() {
        $p_name = $_POST['page_title'];
        $p_caption = $_POST['caption'];
        $p_meta_title = $_POST['meta_title'];
        $p_meta_keywords = $_POST['meta_keywords'];
        $p_meta_description = $_POST['meta_description'];
        $p_description = $_POST['data'];
        $p_image = $this->upload_page_image();
        @$p_publish = $_POST['publish'];
        @$travel_info = $_POST['travel_info'];
        @$service = $_POST['service'];
        $sql = "INSERT INTO page (page_title,caption,meta_title,meta_keywords,meta_description,description,image,publish,travel_info,service) VALUES	 ('$p_name','$p_caption','$p_meta_title','$p_meta_keywords','$p_meta_description','$p_description','$p_image','$p_publish','$travel_info','$service')";
        $this->mysqli->query($sql);
        if ($this->mysqli->error) {
            echo $this->mysqli->error;
        } else {
            echo '<img src="../admin/css/success.gif">';
        }
    }

    function get_page() {
        $sql = "SELECT * FROM page WHERE publish='1'";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function get_single_page($pid) {
        $sql = "SELECT * FROM page WHERE id='$pid'";
        $res = $this->mysqli->query($sql);
        return $res->fetch_array(MYSQLI_ASSOC);
    }

    function get_travel_info() {
        $sql = "SELECT * FROM page WHERE publish='1' AND travel_info='1'";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
    
    function get_services() {
        $sql = "SELECT * FROM page WHERE publish='1' AND service='1'";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function get_single_travel_info($pid) {
        $sql = "SELECT * FROM page WHERE travel_info = '1' AND id='$pid'";
        $res = $this->mysqli->query($sql);
        return $res->fetch_array(MYSQLI_ASSOC);
    }

//end of get_category class

    function update_page($pid) {
        $p_name = $_POST['page_title'];
        $p_caption = $_POST['caption'];
        $p_meta_title = $_POST['meta_title'];
        $p_meta_keywords = $_POST['meta_keywords'];
        $p_meta_description = $_POST['meta_description'];
        $p_description = $_POST['data'];
        $p_image = $this->upload_page_image();
        @$p_publish = $_POST['publish'];
        @$travel_info = $_POST['travel_info'];
        @$service = $_POST['service'];
        if (empty($p_image)) {
            $sql = "UPDATE page SET	 page_title='$p_name',description='$p_description',caption='$p_caption',meta_title='$p_meta_title',meta_keywords='$p_meta_keywords',meta_description='$p_meta_description',publish='$p_publish',travel_info='$travel_info',service='$service' WHERE id='$pid'";
        } else {
            $sql = "UPDATE page SET	 page_title='$p_name',description='$p_description',caption='$p_caption',meta_title='$p_meta_title',meta_keywords='$p_meta_keywords',meta_description='$p_meta_description',image='$p_image',publish='$p_publish',travel_info='$travel_info',service='$service' WHERE id='$pid'";
        }
        $this->mysqli->query($sql);

        if ($this->mysqli->error) {
            echo $this->mysqli->error;
        } else {
            echo "<script type='text/javascript'>alert('Page updated successfully')</script>";
        }
    }

    function delete_page($pid) {
        $sql = "DELETE FROM page WHERE id='$pid'";
        $this->mysqli->query($sql);
    }

    /*     * *************************** Page  functon Ends here ******************************************************************* */


    /*     * *************************** Destination  functon starts here ******************************************************************* */

    function upload_destination_image() {
        if ($_FILES['destination_image']['size'] > 0) {
            $dir = '../images/destination_images';
            $filename1 = $_FILES['destination_image']['name'];
            $srcfile = $_FILES['destination_image']['tmp_name'];
            $targetfile = $dir . '/' . $filename1;
            if (move_uploaded_file($srcfile, $targetfile)) {
                return $filename1;
            } else {
                return $filename1;
            }
        }
    }

    function add_destination() {
        $destination = $_POST['destination'];
        $d_caption = $_POST['caption'];
        $d_meta_title = $_POST['meta_title'];
        $d_meta_keywords = $_POST['meta_keywords'];
        $d_meta_description = $_POST['meta_description'];
        $d_description = $_POST['data'];
        $d_image = $this->upload_destination_image();
        $d_publish = $_POST['publish'];
        $sql = "INSERT INTO destination(destination,caption,meta_title,meta_keywords,meta_description,description,image,publish) VALUES('$destination','$d_caption','$d_meta_title','$d_meta_keywords','$d_meta_description','$d_description','$d_image','$d_publish')";
        $this->mysqli->query($sql);
        if ($this->mysqli->error) {
            $this->mysqli->error;
        } else {
            echo '<img src="../admin/css/success.gif">';
        }
    }

    function get_destination() {
        $sql = "SELECT * FROM destination";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function get_single_destination($pid) {
        $sql = "SELECT * FROM destination WHERE id='$pid'";
        $res = $this->mysqli->query($sql);
        return $res->fetch_array(MYSQLI_ASSOC);
    }

//end of get_category class

    function count_activity($pid) {
        if ($result = $this->mysqli->query("SELECT * FROM activity
			WHERE destination_id='$pid'")) {
            $row_cnt = $result->num_rows;
            return $row_cnt;
        }
    }

    function update_destination($pid) {
        $destination = $_POST['destination'];
        $d_caption = $_POST['caption'];
        $d_meta_title = $_POST['meta_title'];
        $d_meta_keywords = $_POST['meta_keywords'];
        $d_meta_description = $_POST['meta_description'];
        $d_description = $_POST['data'];
        $d_image = $this->upload_destination_image();
        $d_publish = $_POST['publish'];
        if (empty($d_image)) {
            $sql = "UPDATE destination SET destination='$destination',caption='$d_caption',meta_title='$d_meta_title',meta_keywords='$d_meta_keywords',meta_description='$d_meta_description',description='$d_description',publish='$d_publish' WHERE id='$pid'";
            $this->mysqli->query($sql);
        } else {
            $sql = "UPDATE destination SET destination='$destination',meta_title='$d_meta_title',meta_keywords='$d_meta_keywords',meta_description='$d_meta_description',image='$d_image',description='$d_description',publish='$d_publish' WHERE id='$pid'";
            $this->mysqli->query($sql);
        }
        if ($this->mysqli->error) {
            echo $this->mysqli->error;
        } else {
            echo "<script language='javascript'>alert('Destination UPdated successfully');</script>";
        }
    }

    function delete_destination($pid) {
        $sql = "DELETE FROM destination WHERE id='$pid'";
        $this->mysqli->query($sql);
    }

    /*     * *************************** Destination functon Ends here ******************************************************************* */



    /*     * *************************** Activity functon Starts here ******************************************************************* */

    function upload_activity_image() {
        if ($_FILES['activity_image']['size'] > 0) {
            $dir = '../images/activity_images';
            $filename1 = $_FILES['activity_image']['name'];
            $srcfile = $_FILES['activity_image']['tmp_name'];
            $targetfile = $dir . '/' . $filename1;
            if (move_uploaded_file($srcfile, $targetfile)) {
                return $filename1;
            } else {
                return $filename1;
            }
        }
    }

    function add_activity() {
        $a_activity_name = $_POST['activity_name'];
        $a_destination = $_POST['activity_destination'];
        $a_caption = $_POST['caption'];
        $a_meta_title = $_POST['meta_title'];
        $a_meta_keywords = $_POST['meta_keywords'];
        $a_meta_description = $_POST['meta_description'];
        $a_description = $_POST['data'];
        $a_image = $this->upload_activity_image();
        $a_publish = $_POST['publish'];
        $sql = "INSERT INTO activity(activity_name,destination_id,caption,meta_title,meta_keywords,meta_description,description,image,publish) VALUES('$a_activity_name','$a_destination','$a_caption','$a_meta_title','$a_meta_keywords','$a_meta_description','$a_description','$a_image','$a_publish')";
        $this->mysqli->query($sql);
        if ($this->mysqli->error) {
            echo $this->mysqli->error;
        } else {

            echo '<img src="../admin/css/success.gif">';
        }
    }

    function get_activity() {
        $sql = "SELECT * FROM activity ";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function get_destination_activity($pid) {
        $sql = "SELECT * FROM activity where destination_id='$pid'";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function get_single_activity($pid) {
        $sql = "SELECT * FROM activity WHERE id='$pid'";
        $res = $this->mysqli->query($sql);
        return $res->fetch_array(MYSQLI_ASSOC);
    }

//end of get_category class

    function update_activity($pid) {
        $a_name = $_POST['activity_name'];
        $a_destination = $_POST['activity_destination'];
        $a_caption = $_POST['caption'];
        $a_meta_title = $_POST['meta_title'];
        $a_meta_keywords = $_POST['meta_keywords'];
        $a_meta_description = $_POST['meta_description'];
        $a_description = $_POST['data'];
        $a_image = $this->upload_activity_image();
        $a_publish = $_POST['publish'];
        if (empty($a_image)) {
            $sql = "UPDATE activity SET activity_name='$a_name',destination_id='$a_destination',caption='$a_caption',meta_title='$a_meta_title',meta_keywords='$a_meta_keywords',meta_description='$a_meta_description',description='$a_description',publish='$a_publish' WHERE id='$pid'";
            $this->mysqli->query($sql);
        } else {
            $sql = "UPDATE activity SET activity_name='$a_name',destination_id='$a_destination',caption='$a_caption',meta_title='$a_meta_title',meta_keywords='$a_meta_keywords',meta_description='$a_meta_description',description='$a_description',image= '$a_image',publish='$a_publish' WHERE id='$pid'";
            $this->mysqli->query($sql);
        }


        if ($this->mysqli->error) {
            echo $this->mysqli->error;
        } else {
            echo "<script type='text/javascript'>alert('Activity updated successfully')</script>";
        }
    }

    function delete_activity($pid) {
        $sql = "DELETE FROM activity WHERE id='$pid'";
        $this->mysqli->query($sql);
    }

    /*     * *************************** Activity functon Ends here ******************************************************************* */


    /*     * *************************** Region functon Starts here ******************************************************************* */

    function upload_region_image() {
        if ($_FILES['region_image']['size'] > 0) {
            $dir = '../images/region_images';
            $filename1 = $_FILES['region_image']['name'];
            $srcfile = $_FILES['region_image']['tmp_name'];
            $targetfile = $dir . '/' . $filename1;
            if (move_uploaded_file($srcfile, $targetfile)) {
                return $filename1;
            } else {
                return $filename1;
            }
        }
    }

    function add_region() {
        $r_name = $_POST['region_name'];
        $r_destination = $_POST['destination'];
        $r_activity = $_POST['activity'];
        $r_caption = $_POST['caption'];
        $r_meta_title = $_POST['meta_title'];
        $r_meta_keywords = $_POST['meta_keywords'];
        $r_meta_description = $_POST['meta_description'];
        $r_description = $_POST['data'];
        $r_highlights = $_POST['highlights'];
        $r_image = $this->upload_region_image();
        $r_publish = $_POST['publish'];
        $sql = "INSERT INTO region (region_name,destination_id,activity_id,caption,meta_title,meta_keywords,meta_description,description,highlights,image,publish) VALUES ('$r_name','$r_destination','$r_activity','$r_caption','$r_meta_title','$r_meta_keywords','$r_meta_description','$r_description','$r_highlights','$r_image','$r_publish')";
        $this->mysqli->query($sql);
        if ($this->mysqli->error) {
            echo $this->mysqli->error;
        } else {
            echo '<img src="../admin/css/success.gif">';
        }
    }

    function get_region() {
        $sql = "SELECT * FROM region ";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function get_featured_region($pid) {
        $sql = "SELECT * FROM region where activity_id='$pid' AND publish='1'";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function get_region_with_activity($aid) {
        $sql = "SELECT * FROM region where activity_id='$aid'";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function get_single_region($pid) {
        $sql = "SELECT * FROM region WHERE id='$pid'";
        $res = $this->mysqli->query($sql);
        return $res->fetch_array(MYSQLI_ASSOC);
    }

//end of get_category class

    function count_region($pid) {
        if ($result = $this->mysqli->query("SELECT * FROM region
			WHERE activity_id='$pid'")) {
            $row_cnt = $result->num_rows;
            return $row_cnt;
        }
    }

    function update_region($pid) {
        $r_name = $_POST['region_name'];
        $r_destination = $_POST['destination'];
        $r_activity = $_POST['activity'];
        $r_caption = $_POST['caption'];
        $r_meta_title = $_POST['meta_title'];
        $r_meta_keywords = $_POST['meta_keywords'];
        $r_meta_description = $_POST['meta_description'];
        $r_description = $_POST['data'];
        $r_highlights = $_POST['highlights'];
        $r_image = $this->upload_region_image();
        $r_publish = $_POST['publish'];
        if (empty($r_image)) {
            $sql = "UPDATE region SET region_name='$r_name',destination_id='$r_destination',caption='$r_caption',meta_title='$r_meta_title',meta_keywords='$r_meta_keywords',meta_description='$r_meta_description',description='$r_description',highlights='$r_highlights',publish='$r_publish' WHERE id='$pid'";
            $this->mysqli->query($sql);
        } else {
            $sql = "UPDATE region SET region_name='$r_name',destination_id='$r_destination',caption='$r_caption',meta_title='$r_meta_title',meta_keywords='$r_meta_keywords',meta_description='$r_meta_description',description='$r_description',highlights='$r_highlights', image='$r_image',publish='$r_publish' WHERE id='$pid'";
            $this->mysqli->query($sql);
        }
        if ($this->mysqli->error) {
            echo $this->mysqli->error;
        } else {
            echo "<script type='text/javascript'>alert('Region updated successfully')</script>";
        }
    }

    function delete_region($pid) {
        $sql = "DELETE FROM region WHERE id='$pid'";
        $this->mysqli->query($sql);
    }

    /*     * *************************** Region functon Ends here ******************************************************************* */

    /*     * *************************** Trip functon Starts here ******************************************************************* */

    function upload_trip_image() {
        if ($_FILES['trip_image']['size'] > 0) {
            $dir = '../images/trip_images';
            $filename1 = $_FILES['trip_image']['name'];
            $srcfile = $_FILES['trip_image']['tmp_name'];
            $targetfile = $dir . '/' . $filename1;
            if (move_uploaded_file($srcfile, $targetfile)) {
                return $filename1;
            } else {
                return $filename1;
            }
        }
    }

    function add_trip() {
        $t_name = $_POST['trip_name'];
        $t_destination = $_POST['destination'];
        $t_activity = $_POST['activity'];
        $t_region = $_POST['trip_region'];
        $t_caption = $_POST['caption'];
        $t_meta_title = $_POST['meta_title'];
        $t_meta_keywords = $_POST['meta_keywords'];
        $t_meta_description = $_POST['meta_description'];
        $t_description = $_POST['data'];
        $t_video = $_POST['video'];
        $t_country = $_POST['country'];
        $t_duration = $_POST['duration'];
        $t_trip_type = $_POST['trip_type'];
        $t_price = $_POST['price'];
        $t_discount_date = $_POST['discount_date'];
        $t_discount_detail = $_POST['discount_detail'];
        $t_trip_fact = $_POST['trip_fact'];
        $t_gallery = $_POST['gallery'];
        $t_challenging_trip = $_POST['challenging'];
        $t_expedition_trip = $_POST['expedition'];
        $t_adventure_holiday = $_POST['adventure'];
        $t_autumn = $_POST['autumn'];
        $t_sell_trip = $_POST['sell'];
        $t_image = $this->upload_trip_image();
        $t_publish = $_POST['publish'];
        $sql = "INSERT INTO trip (trip_name,destination_id,activity_id,region_id,caption,meta_title,meta_keywords,meta_description,description,video,country,duration,trip_type,price,discount_date,discount_detail,trip_facts,gallery_id,challenging_trips,expedition_trips,adventure_holidays,trip_for_autumn,best_sell_trip,image,publish) VALUES ('$t_name','$t_destination','$t_activity','$t_region','$t_caption','$t_meta_title','$t_meta_keywords','$t_meta_description','$t_description','$t_video','$t_country','$t_duration','$t_trip_type','$t_price','$t_discount_date','$t_discount_detail','$t_trip_fact','$t_gallery','$t_challenging_trip','$t_expedition_trip','$t_adventure_holiday','$t_autumn','$t_sell_trip','$t_image','$t_publish')";
        $this->mysqli->query($sql);
        if ($this->mysqli->error) {
            echo $this->mysqli->error;
        } else {
            echo '<img src="../admin/css/success.gif">';
        }
    }

    function get_all_trip_details() {
        $sql = "SELECT t . * , d.destination, a.activity_name, r.region_name
FROM trip t
INNER JOIN destination d ON d.id = t.destination_id
INNER JOIN activity a ON a.id = t.activity_id
INNER JOIN region r ON r.id = t.region_id";

        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function get_trip() {
        $sql = "SELECT * FROM trip ";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function get_best_sold_trip($tid) {
        $sql = "SELECT * FROM trip where best_sell_trip='1' and activity_id='$tid'";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function get_trip_with_region($rid, $aid) {
        $sql = "SELECT * FROM trip where region_id='$rid' AND activity_id='$aid'";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function get_single_trip($pid) {
        $sql = "SELECT * FROM trip WHERE id='$pid'";
        $res = $this->mysqli->query($sql);
        return $res->fetch_array(MYSQLI_ASSOC);
    }

//end of get_category class

    function count_trip($pid) {
        if ($result = $this->mysqli->query("SELECT * FROM trip WHERE region_id='$pid'")) {
            $row_cnt = $result->num_rows;
            return $row_cnt;
        }
    }

    function update_trip($pid) {
        $t_name = $_POST['trip_name'];
        $t_destination = $_POST['destination'];
        $t_activity = $_POST['activity'];
        $t_region = $_POST['trip_region'];
        $t_caption = $_POST['caption'];
        $t_meta_title = $_POST['meta_title'];
        $t_meta_keywords = $_POST['meta_keywords'];
        $t_meta_description = $_POST['meta_description'];
        $t_description = $_POST['data'];
        $t_video = $_POST['video'];
        $t_country = $_POST['country'];
        $t_duration = $_POST['duration'];
        $t_trip_type = $_POST['trip_type'];
        $t_price = $_POST['price'];
        $t_discount_date = $_POST['discount_date'];
        $t_discount_detail = $_POST['discount_detail'];
        $t_trip_fact = $_POST['trip_fact'];
        $t_gallery = $_POST['gallery'];
        $t_challenging_trip = $_POST['challenging'];
        $t_expedition_trip = $_POST['expedition'];
        $t_adventure_holiday = $_POST['adventure'];
        $t_autumn = $_POST['autumn'];
        $t_sell_trip = $_POST['sell'];
        $t_image = $this->upload_trip_image();
        $t_publish = $_POST['publish'];
        if (empty($t_image)) {
            $sql = "UPDATE trip SET trip_name='$t_name',destination_id='$t_destination',activity_id='$t_activity',region_id='$t_region',caption='$t_caption',meta_title='$t_meta_title',meta_keywords='$t_meta_keywords',meta_title='$t_meta_title',meta_description='$t_meta_description',description='$t_description',video='$t_video',country='$t_country',duration='$t_duration',trip_type='$t_trip_type',
		price='$t_price',discount_date='$t_discount_date',discount_detail='$t_discount_detail',trip_facts='$t_trip_fact',gallery_id='$t_gallery',challenging_trips='$t_challenging_trip',
		expedition_trips='$t_expedition_trip',adventure_holidays='$t_adventure_holiday',trip_for_autumn='$t_autumn',best_sell_trip='$t_sell_trip',
		publish='$t_publish' WHERE id='$pid'";
            $this->mysqli->query($sql);
        } else {
            $sql = "UPDATE trip SET trip_name='$t_name',destination_id='$t_destination',activity_id='$t_activity',region_id='$t_region',caption='$t_caption',meta_title='$t_meta_title',meta_keywords='$t_meta_keywords',meta_title='$t_meta_title',meta_description='$t_meta_description',description='$t_description',video='$t_video',country='$t_country',duration='$t_duration',trip_type='$t_trip_type',
		price='$t_price',discount_date='$t_discount_date',discount_detail='$t_discount_detail',trip_facts='$t_trip_fact',gallery_id='$t_gallery',challenging_trips='$t_challenging_trip',
		expedition_trips='$t_expedition_trip',adventure_holidays='$t_adventure_holiday',trip_for_autumn='$t_autumn',best_sell_trip='$t_sell_trip',
		image='$t_image',publish='$t_publish' WHERE id='$pid'";
            $this->mysqli->query($sql);
        }


        if ($this->mysqli->error) {
            echo $this->mysqli->error;
        } else {
            echo "<script type='text/javascript'>alert('Trip updated successfully')</script>";
        }
    }

    function delete_trip($pid) {
        $sql = "DELETE FROM trip WHERE id='$pid'";
        $this->mysqli->query($sql);
    }

    /*     * *************************** Trip  functon Ends here ******************************************************************* */


    /*     * *************************** Itinerary  functon starts here ******************************************************************* */

    function add_itinerary() {
        $i_trip_name = $_POST['trip_name'];
        $i_region_name = $_POST['region_name'];
        $i_price_include = $_POST['price_include'];
        $i_price_exclude = $_POST['price_exclude'];
        $i_equipment = $_POST['equipment'];
        $i_itinerary_detail = $_POST['itinerary_detail'];
        $i_faqs = $_POST['faqs'];
        $i_highlight = $_POST['highlight'];
        $i_video_link = $_POST['video_link'];
        $sql = "INSERT INTO itinerary (trip_id,region_id,price_include,price_exclude,equipment,itinerary_detail,faqs,highlight,video_link) VALUES ('$i_trip_name','$i_region_name','$i_price_include','$i_price_exclude','$i_equipment','$i_itinerary_detail','$i_faqs','$i_highlight','$i_video_link')";
        $this->mysqli->query($sql);
        if ($this->mysqli->error) {
            echo $this->mysqli->error;
        } else {
            echo '<img src="../admin/css/success.gif">';
        }
    }

    function get_itinerary_trip() {
        $sql = "SELECT i.*,t.trip_name FROM itinerary i INNER JOIN trip t ON i.trip_id=t.id";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function get_itinerary_region() {
        $sql = "SELECT i.*,r.region_name FROM itinerary i INNER JOIN region r ON i.region_id=r.id";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function get_single_itinerary_trip($pid) {
        $sql = "SELECT i.*,t.trip_name FROM itinerary i  INNER JOIN trip t ON i.trip_id=t.id WHERE i.id='$pid'";

        $res = $this->mysqli->query($sql);
        return $res->fetch_array(MYSQLI_ASSOC);
    }

    function get_single_itinerary($pid) {
        $sql = "SELECT * FROM itinerary WHERE id='$pid'";
        $res = $this->mysqli->query($sql);
        return $res->fetch_array(MYSQLI_ASSOC);
    }

//end of get_category class

    function get_single_trip_itinerary($pid) {
        $sql = "SELECT * FROM itinerary WHERE trip_id='$pid'"; //biased line
        $res = $this->mysqli->query($sql);
        return $res->fetch_array(MYSQLI_ASSOC);
    }

//end of get_category class

    function get_single_region_itinerary($pid) {
        //print_r($pid); die();
        $sql = "SELECT * FROM itinerary WHERE region_id='$pid' AND trip_id='0'";
        $res = $this->mysqli->query($sql);
        return $res->fetch_array(MYSQLI_ASSOC);
    }

//end of get_category class

    function update_itinerary($pid) {
        $i_trip_name = $_POST['trip_name'];
        $i_region_name = $_POST['region_name'];
        $i_price_include = $_POST['price_include'];
        $i_price_exclude = $_POST['price_exclude'];
        $i_equipment = $_POST['equipment'];
        $i_itinerary_detail = $_POST['itinerary_detail'];
        $i_faqs = $_POST['faqs'];
        $i_highlight = $_POST['highlight'];
        $i_video_link = $_POST['video_link'];
        $sql = "UPDATE itinerary SET trip_id='$i_trip_name',region_id='$i_region_name',price_include='$i_price_include',price_exclude='$i_price_exclude',equipment='$i_equipment',itinerary_detail='$i_itinerary_detail',faqs='$i_faqs',
			highlight='$i_highlight',video_link='$i_video_link' WHERE id='$pid'";
        $this->mysqli->query($sql);
        if ($this->mysqli->error) {
            echo $this->mysqli->error;
        } else {
            echo "<script type='text/javascript'>alert('Itinerary updated successfully')</script>";
        }
    }

    function delete_itinerary($pid) {
        $sql = "DELETE FROM itinerary WHERE id='$pid'";
        $this->mysqli->query($sql);
    }

    function delete_region_itinerary($rid) {

        $sql = "DELETE FROM itinerary WHERE region_id='$rid' AND trip_id='0'";
        $this->mysqli->query($sql);
    }

    /*     * *************************** Itinerary  functon starts here ******************************************************************* */


    /*     * *************************** Testimonial  functon starts here ******************************************************************* */

    function upload_testimonial_image() {
        if ($_FILES['testimonial_image']['size'] > 0) {
            $dir = '../images/testimonial_images';
            $filename1 = $_FILES['testimonial_image']['name'];
            $srcfile = $_FILES['testimonial_image']['tmp_name'];
            $targetfile = $dir . '/' . $filename1;
            if (move_uploaded_file($srcfile, $targetfile)) {
                return $filename1;
            } else {
                return $filename1;
            }
        }
    }

    function add_testimonial() {
        $t_title = $_POST['title'];
        $t_person_name = $_POST['person_name'];
        $t_country = $_POST['country'];
        $t_description = $_POST['data'];
        $t_image = $this->upload_testimonial_image();
        $t_publish = $_POST['publish'];
        $sql = "INSERT INTO testimonial(title,person_name,country,description,image,publish) VALUES ('$t_title','$t_person_name','$t_country','$t_description','$t_image','$t_publish')";
        $this->mysqli->query($sql);
        if ($this->mysqli->error) {
            echo $this->mysqli->error;
        } else {
            echo '<img src="../admin/css/success.gif">';
        }
    }

    function get_testimonial() {
        $sql = "SELECT * FROM testimonial";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function get_single_testimonial($pid) {
        $sql = "SELECT * FROM testimonial WHERE id='$pid'";
        $res = $this->mysqli->query($sql);
        return $res->fetch_array(MYSQLI_ASSOC);
    }

    function update_testimonial($pid) {
        $t_title = $_POST['title'];
        $t_person_name = $_POST['person_name'];
        $t_country = $_POST['country'];
        $t_description = $_POST['data'];
        $t_image = $this->upload_testimonial_image();
        $t_publish = $_POST['publish'];
        if (empty($t_image)) {
            $sql = "UPDATE  testimonial SET title='$t_title',person_name='$t_person_name',country='$t_country',description='$t_description',publish='$t_publish' WHERE id='$pid'";
            $this->mysqli->query($sql);
        } else {
            $sql = "UPDATE SET testimonial title='$t_title',person_name='$t_person_name',country='$t_country',description='$t_description',image'$t_image',publish='$t_publish' WHERE id='$pid'";
            $this->mysqli->query($sql);
        }
        if ($this->mysqli->error) {

            echo $this->mysqli->error;
        } else {
            echo "<script type='text/javascript'>alert('Testimonial updated successfully')</script>";
        }
    }

    function delete_testimonial($pid) {
        $sql = "DELETE FROM testimonial WHERE id='$pid'";
        $this->mysqli->query($sql);
    }

    /*     * *************************** Testimonial  functon Ends here ******************************************************************* */

    function upload_travel_image() {
        if ($_FILES['travel_image']['size'] > 0) {
            $dir = '../images/travel_images';
            $filename1 = $_FILES['travel_image']['name'];
            $srcfile = $_FILES['travel_image']['tmp_name'];
            $targetfile = $dir . '/' . $filename1;
            if (move_uploaded_file($srcfile, $targetfile)) {
                return $filename1;
            } else {
                return $filename1;
            }
        }
    }

    function add_travelinfo() {
        $travel_title = $_POST['travel_title'];
        $travel_details = $_POST['data'];
        $meta_title = $_POST['meta_title'];
        $meta_keywords = $_POST['meta_keywords'];
        $meta_description = $_POST['meta_description'];
        $travel_image = $this->upload_travel_image();
        $publish = $_POST['publish'];
        $sql = "INSERT INTO travelinfo_category (category,description,image,meta_title,meta_keywords,meta_description,publish) VALUES('$travel_title','$travel_details','$travel_image','$meta_title','$meta_keywords','$meta_description','$publish')";
        $this->mysqli->query($sql);
        if ($this->mysqli->error) {
            echo "Records were not added";
        } else {
            echo '<img src="../admin/css/success.gif">';
        }
    }

// end of the add news class

    function get_travelinfo() {
        $sql = "SELECT * FROM travelinfo_category LIMIT 4 ";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function get_single_travelinfo($pid) {
        $sql = "SELECT * FROM travelinfo_category WHERE id='$pid'";
        $res = $this->mysqli->query($sql);
        return $res->fetch_array(MYSQLI_ASSOC);
    }

//end of get_category class

    function get_featured_travelinfo() {
        $sql = "SELECT * FROM news WHERE parentid='' AND featured='1' ORDER BY id DESC LIMIT 7";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function update_travelinfo($pid) {
        $travel_title = $_POST['travel_title'];
        $travel_details = $_POST['data'];
        $meta_title = $_POST['meta_title'];
        $meta_keywords = $_POST['meta_keywords'];
        $meta_description = $_POST['meta_description'];
        $travel_image = $this->upload_travel_image();
        $publish = $_POST['publish'];
        if (empty($travel_image)) {
            $sql = "UPDATE travelinfo_category set category='$travel_title',description='$travel_details',publish='$publish' WHERE id='$pid'";
        } else {
            $sql = "UPDATE travelinfo_category set category='$travel_title',description='$travel_details',image='$travel_image',publish='$publish' WHERE id='$pid'";
        }
        $this->mysqli->query($sql);
        if ($this->mysqli->error) {
            echo "Records were not updated";
        } else {
            echo "<script language='javascript'>alert('Travelinfo Updated successfully');</script>";
        }
    }

// end of the add news class


    /*     * ********************** Travel Info  functions end here ************************************************************ */


    /*     * ********************** Travel Info Subpage  functions Starts here ************************************************************ */

    function upload_subpage_image() {
        if ($_FILES['subpage_image']['size'] > 0) {
            $dir = '../images/subpage_images';
            $filename1 = $_FILES['subpage_image']['name'];
            $srcfile = $_FILES['subpage_image']['tmp_name'];
            $targetfile = $dir . '/' . $filename1;
            if (move_uploaded_file($srcfile, $targetfile)) {
                return $filename1;
            } else {
                return $filename1;
            }
        }
    }

    function add_subpage() {
        $subpage_category = $_POST['category'];
        $subpage_title = $_POST['title'];
        $subpage_description = $_POST['data'];
        $subpage_meta_title = $_POST['meta_title'];
        $subpage_meta_keywords = $_POST['meta_keywords'];
        $subpage_meta_description = $_POST['meta_description'];
        $subpage_image = $this->upload_subpage_image();
        $subpage_publish = $_POST['publish'];
        $sql = "INSERT INTO travelinfo_subpage(title,description,image,meta_title,meta_keywords,meta_description,cat_id,publish) VALUES('$subpage_title','$subpage_description','$subpage_image','$subpage_meta_title','$subpage_meta_keywords','$subpage_meta_description','$subpage_category','$subpage_publish')";
        $this->mysqli->query($sql);
        if ($this->mysqli->error) {
            echo $this->mysqli->error;
        } else {
            echo '<img src="../admin/css/success.gif">';
        }
    }

    function get_travelinfo_subpage() {
        $sql = "SELECT travelinfo_category.category,travelinfo_subpage.id,travelinfo_subpage.title,travelinfo_subpage.description,travelinfo_subpage.image,travelinfo_subpage.meta_title,travelinfo_subpage.meta_keywords,travelinfo_subpage.meta_description,travelinfo_subpage.publish FROM travelinfo_category INNER JOIN travelinfo_subpage ON travelinfo_category.id=travelinfo_subpage.cat_id";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function get_single_travelinfo_subpage($pid) {
        $sql = "SELECT * FROM travelinfo_subpage WHERE id='$pid'";
        $res = $this->mysqli->query($sql);
        return $res->fetch_array(MYSQLI_ASSOC);
    }

//end of get_category class

    function update_travelinfo_subpage($pid) {
        $subpage_title = $_POST['title'];
        $subpage_details = $_POST['data'];
        $meta_title = $_POST['meta_title'];
        $meta_keywords = $_POST['meta_keywords'];
        $meta_description = $_POST['meta_description'];
        $subpage_image = $this->upload_subpage_image();
        $publish = $_POST['publish'];
        if (empty($subpage_image)) {
            $sql = "UPDATE travelinfo_subpage set title='$subpage_title',description='$subpage_details',publish='$publish' WHERE id='$pid'";
        } else {
            $sql = "UPDATE travelinfo_subpage set title='$subpage_title',description='$subpage_details',image='$subpage_image',publish='$publish' WHERE id='$pid'";
        }
        $this->mysqli->query($sql);
        if ($this->mysqli->error) {
            echo "Records were not updated";
        } else {
            echo "<script language='javascript'>alert('Travelinfo Subpage Updated successfully');</script>";
        }
    }

    function delete_travelinfo_subpage($pid) {
        $sql = "DELETE FROM travelinfo_subpage WHERE id='$pid'";
        $this->mysqli->query($sql);
    }

    /*     * ********************** Travel Info Subpage  functions Ends here ************************************************************ */



    /*     * ********************** Package functions Starts here ************************************************************ */

    function get_country() {
        $sql = "Select * FROM country";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function upload_package_image() {
        if ($_FILES['package_image']['size'] > 0) {
            $dir = '../images/package_images';
            $filename1 = $_FILES['package_image']['name'];
            $srcfile = $_FILES['package_image']['tmp_name'];
            $targetfile = $dir . '/' . $filename1;
            if (move_uploaded_file($srcfile, $targetfile)) {
                return $filename1;
            } else {
                return $filename1;
            }
        }
    }

    function add_packagetype() {
        $package_name = $_POST['package_name'];
        $country_package = $_POST['country'];
        $p_meta_title = $_POST['meta_title'];
        $p_meta_keywords = $_POST['meta_keywords'];
        $p_meta_description = $_POST['meta_description'];
        $p_description = $_POST['data'];
        $p_publish = $_POST['publish'];
        $package_image = $this->upload_package_image();
        $sql = "INSERT INTO packagetype (country_id,package_name,meta_title,meta_keywords,meta_description,description,image,publish) VALUES('$country_package','$package_name','$p_meta_title','$p_meta_keywords','$p_meta_description','$p_description','$package_image','$p_publish')";
        $this->mysqli->query($sql);
        if ($this->mysqli->error) {
            echo $this->mysqli->error;
        } else {
            echo '<img src="../admin/css/success.gif">';
        }
    }

    function get_packagetype() {
        $sql = "SELECT country.country,packagetype.id,packagetype.package_name,packagetype.description,packagetype.image,packagetype.meta_title,packagetype.meta_keywords,packagetype.meta_description,packagetype.publish FROM country INNER JOIN packagetype ON country.id=packagetype.country_id";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    function get_single_packagetype($pid) {
        $sql = "SELECT country.country,packagetype.id,packagetype.package_name,packagetype.description,packagetype.image,packagetype.meta_title,packagetype.meta_keywords,packagetype.meta_description,packagetype.publish FROM country INNER JOIN packagetype ON country.id=packagetype.country_id AND packagetype.id='$pid'";
        $res = $this->mysqli->query($sql);
        return $res->fetch_array(MYSQLI_ASSOC);
    }

    function get_single_package($pid) {
        $sql = "SELECT country.country,packagetype.id,packagetype.package_name,packagetype.description,packagetype.image,packagetype.meta_title,packagetype.meta_keywords,packagetype.meta_description,packagetype.publish FROM country INNER JOIN packagetype ON country.id=packagetype.country_id AND packagetype.id='$pid'";
        $res = $this->mysqli->query($sql);
        return $res->fetch_array(MYSQLI_ASSOC);
    }

//end of get_category class

    function update_packagetype($pid) {
        $package_name = $_POST['package_name'];
        $p_meta_title = $_POST['meta_title'];
        $p_meta_keywords = $_POST['meta_keywords'];
        $p_meta_description = $_POST['meta_description'];
        $p_description = $_POST['data'];
        $p_publish = $_POST['publish'];
        $p_country = $_POST['country'];
        $p_image = $this->upload_package_image();
        if (empty($p_image)) {
            $sql = "UPDATE packagetype SET package_name='$package_name',meta_title='$p_meta_title',meta_keywords='$p_meta_keywords',meta_description='$p_meta_description',description='$p_description',country_id='$p_country',publish='$p_publish' WHERE id='$pid'";
            $this->mysqli->query($sql);
        } else {
            $sql = "UPDATE packagetype SET package_name='$package_name',meta_title='$p_meta_title',meta_keywords='$p_meta_keywords',meta_description='$p_meta_description',description='$p_description',image='$p_image',country_id='$p_country',publish='$p_publish' WHERE id='$pid'";
            $this->mysqli->query($sql);
        }

        if ($this->mysqli->error) {
            echo $this->mysqli->error;
        } else {
            echo "<script language='javascript'>alert(' Package Updated successfully');</script>";
        }
    }

    function delete_packagetype($pid) {
        $sql = "DELETE FROM packagetype WHERE id='$pid'";
        $this->mysqli->query($sql);
    }

    /*     * ********************** Package functions Ends here ************************************************************ */

    /*     * ********************** Album functions Ends here ************************************************************ */

    function upload_album_image() {
        if ($_FILES['image']['size'] > 0) {
            $dir = '../images/album_images';
            $filename1 = $_FILES['image']['name'];
            $srcfile = $_FILES['image']['tmp_name'];
            $targetfile = $dir . '/' . $filename1;
            if (move_uploaded_file($srcfile, $targetfile)) {
                return $filename1;
            } else {
                return $filename1;
            }
        }
    }

    function add_album() {
        $name = $_POST['name'];
        $image = $this->upload_album_image();
        $sql = "INSERT INTO album (name,image) VALUES ('$name','$image')";
        $this->mysqli->query($sql);
        if ($this->mysqli->error) {
            echo "Records were not added";
        } else {
            //echo "<script language='javascript'>alert('New Album added successfully');</script>";
            echo '<img src="../admin/css/success.gif">';
        }
    }

// end of the add news class

    function get_album() {
        $sql = "SELECT * FROM album";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

//end of get_record class

    function get_single_album($pid) {
        $sql = "SELECT * FROM album WHERE id='$pid'";
        $res = $this->mysqli->query($sql);
        return $res->fetch_array(MYSQLI_ASSOC);
    }

    function update_album($pid) {
        $name = $_POST['name'];
        $image = $this->upload_album_image();
        if (empty($image)) {
            $sql = "UPDATE album set name='$name' WHERE id='$pid'";
        } else {
            $sql = "UPDATE album set name='$name',image='$image' WHERE id='$pid'";
        }
        $this->mysqli->query($sql);
        if ($this->mysqli->error) {
            echo "Records were not added";
        } else {
            echo "<script language='javascript'>alert('Album updated successfully');</script>";
            //echo '<img src="../admin/css/success.gif">';
        }
    }

// end of the add news class
//	

    function upload_image() {
        $image = array();
        for ($i = 0; $i <= count($_FILES['image']['name']); $i++) {
            if (@$_FILES['image']['size'][$i] > 0) {
                $dir = '../images/album_images';
                $filename[$i] = $_FILES['image']['name'][$i];
                $srcfile[$i] = $_FILES['image']['tmp_name'][$i];
                $targetfile[$i] = $dir . '/' . $filename[$i];
                move_uploaded_file($srcfile[$i], $targetfile[$i]);
                $image[] = $filename[$i];
            }
        }
        return $image;
    }

    function add_image() {
        $album_image = array();
        $album_image = $this->upload_image();
        $caption = $_POST['caption'];
        $album_id = $_POST['album_id'];
        foreach ($album_image as $image) {
            $sql = "INSERT INTO photos (image,caption,album_id) VALUES ('$image','$caption','$album_id')";
            $this->mysqli->query($sql);
        }
        if ($this->mysqli->error) {
            echo $this->mysqli->error;
        } else {
            //echo "<script language='javascript'>alert('New Album added successfully');</script>";
            echo '<img src="../admin/css/success.gif">';
        }
    }

// end of the add news class

    function get_image() {
        $sql = "SELECT * FROM photos";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

//end of get_record class

    function get_single_image($pid) {
        $sql = "SELECT * FROM photos WHERE album_id='$pid'";
        $res = $this->mysqli->query($sql);
        $data = array();
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

//end of get_record class*/

    function delete_album($pid) {
        $sql = "DELETE FROM album WHERE id='$pid'";
        $this->mysqli->query($sql);
    }

    function delete_image($pid) {
        $sql = "DELETE FROM photos WHERE id='$pid'";
        $this->mysqli->query($sql);
    }

    /*     * ********************** album functions Ends here ************************************************************ */

    function send_contact() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $comments = $_POST['comments'];
        $message = 'Name :' . $name . "\n" .
                'Email : ' . $email . "\n" .
                'Phone : ' . $phone . "\n" .
                'Message :' . $comments;

        $email_to = "utsav_bhetu@hotmail.com";
        $email_from = $email;
        $email_subject = "Message from the Contact Form";

        $headers = 'From: ' . $email_from . "\r\n" .
                'Reply-To: ' . $email_from . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $message, $headers);


        echo "<script language='javascript'>alert('Thankyou for your comments. We will reply you soon ');</script>";
        echo "<script language='javascript'>history.back(-1);</script>";
    }

    function make_booking() {
        $trip_name = $_POST['trip_name'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $country = $_POST['country'];
        $no = $_POST['no_of_persons'];
        $trip_duration = $_POST['trip_duration'];
        $a_month = $_POST['a_month'];
        $a_day = $_POST['a_day'];
        $a_year = $_POST['a_year'];
        $d_month = $_POST['d_month'];
        $d_day = $_POST['d_day'];
        $d_year = $_POST['d_year'];
        $airline = $_POST['airline'];
        $flight_number = $_POST['flight_number'];
        $pickup = $_POST['pickup'];
        $comment = $_POST['comment'];

        $message = 'Trip Name :' . $trip_name . "\n" .
                'First Name : ' . $fname . "\n" .
                'Email : ' . $email . "\n" .
                'Phone : ' . $phone . "\n" .
                'country : ' . $country . "\n" .
                'Number of Persons : ' . $no. "\n" .
                'Trip Duration : ' . $trip_duration . "\n" .
                'Arrival : ' . $a_month."-".$a_day."-".$a_year . "\n" .
                'Departure : ' . $d_month."-".$d_day."-".$d_year . "\n" .
                'Airline : ' . $airline . "\n" .
                'flight Number : ' . $flight_number . "\n" .
                'Airport Pickup : ' . $pickup . "\n" .
                'Comment :' . $comment;
        $email_to = "utsav_bhetu@hotmail.com";
        $email_from = $email;
        $email_subject = "Message from Website booking form Plan himalaya";

        $headers = 'From: ' . $email_from . "\r\n" .
                'Reply-To: ' . $email_from . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $message, $headers);


                echo "<script language='javascript'>alert('Your Booking has been made successfully , We will respond you shortly ');</script>";
        echo "<script language='javascript'>history.back(-1);</script>";
    }
    
    function reserve_flight() {
        $trip_name = $_POST['trip_name'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $country = $_POST['country'];
        $no = $_POST['no_of_person'];        
        $a_month = $_POST['a_month'];
        $a_day = $_POST['a_day'];
        $a_year = $_POST['a_year'];
        $flight_number = $_POST['flight_no'];
        $pickup = $_POST['pickup'];
        $r_month = $_POST['r_month'];
        $r_day = $_POST['r_day'];
        $r_year = $_POST['r_year'];
        $airline = $_POST['airline'];
        $no_of_seat = $_POST['no_of_seat'];       
        $comment = $_POST['comment'];

        $message = 'Trip Name :' . $trip_name . "\n" .
                'First Name : ' . $fname . "\n" .
                'Email : ' . $email . "\n" .
                'Phone : ' . $phone . "\n" .
                'country : ' . $country . "\n" .
                'Number of Persons : ' . $no. "\n" .
                'Arrival : ' . $a_month."-".$a_day."-".$a_year . "\n" .
                'flight Number : ' . $flight_number . "\n" .
                'Airport Pickup : ' . $pickup . "\n" .
                'Reservation Date : ' . $r_month."-".$r_day."-".$r_year . "\n" .
                'Airline : ' . $airline . "\n" .
                'Number of Seat : ' . $no_of_seat. "\n".                
                'Comment :' . $comment;
        
        $email_to = "utsav_bhetu@hotmail.com";
        $email_from = $email;
        $email_subject = "Message from Flight reservation form Plan himalaya";

        $headers = 'From: ' . $email_from . "\r\n" .
                'Reply-To: ' . $email_from . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $message, $headers);


                echo "<script language='javascript'>alert('Your Reservation has been made successfully , We will respond you shortly ');</script>";
        echo "<script language='javascript'>history.back(-1);</script>";
    }

}

//end of class
?>