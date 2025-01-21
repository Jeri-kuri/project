<?php

use Orm\Model;


class Model_Goal extends Orm\Model
{
    protected static $_table_name = 'goals';
    protected static $_properties =[
        'id',
        'user_id',
        'goal',
        'created_at',
        'updated_at',
    ];

    protected static $_created_at = 'created_at';
    protected static $_updated_at = 'updated_at';
}