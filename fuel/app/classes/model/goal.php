<?php

use Orm\Model;

class Model_Goal extends Model
{
    protected static $_properties = array(
        'id',
        'user_id',
        'goal',
        'created_at',
        'updated_at',
    );

    protected static $_table_name = 'goals';

}