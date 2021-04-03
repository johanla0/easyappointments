<?php defined('BASEPATH') or exit('No direct script access allowed');

/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) 2013 - 2020, Alex Tselegidis
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        http://easyappointments.org
 * @since       v1.4.0
 * ---------------------------------------------------------------------------- */

/**
 * Class Migration_Add_middle_name_status_position_birthdate_to_user
 *
 * @property CI_DB_query_builder $db
 * @property CI_DB_forge $dbforge
 */
class Migration_Add_middle_name_status_position_birthdate_to_user extends CI_Migration {
    /**
     * Upgrade method.
     */
    public function up()
    {
        if ( ! $this->db->field_exists('middle_name', 'users'))
        {
            $fields = [
                'middle_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '256',
                    'default' => 'NULL',
                    'after' => 'first_name'
                ],
                'position' => [
                    'type' => 'VARCHAR',
                    'constraint' => '256',
                    'default' => 'NULL',
                    'after' => 'last_name'
                ],
                'status' => [
                    'type' => 'VARCHAR',
                    'constraint' => '256',
                    'default' => 'NULL',
                    'after' => 'last_name'
                ],
                'birth_date' => [
                    'type' => 'DATE',
                    'default' => 'NULL',
                    'after' => 'last_name'
                ],
            ];

            $this->dbforge->add_column('users', $fields);
        }
    }

    /**
     * Downgrade method.
     */
    public function down()
    {   
        $fields = ['middle_name', 'status', 'position', 'birth_date'];
        $this->dbforge->drop_column('users', $fields);
    }
}
