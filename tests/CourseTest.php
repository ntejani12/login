<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CourseTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testLogin()
    {
    	$this->visit('/login')->type('admin@gmail.com', 'email')->type('admin', 'password')
    		->press('Login')
    		//->visit('/home')
    		->visit('/admin/newcourse')
    		->type('Test Course', 'name')
    		->type('123 Test Course', 'address')
    		->type('Test City', 'city')
    		->type('TS', 'state')
    		->type('12345', 'zip')
    		->type('4695799208', 'phone')
    		->type('test@gmail.com', 'email')
    		->type('testwebsite.com', 'website')
    		->type('black', 'color1')
    		->type('green', 'color2')
    		->type('orange', 'color3')
    		->type('red', 'color4')
    		->type('blue', 'color5')
    		->type('white', 'color6');
    		

    }
}
