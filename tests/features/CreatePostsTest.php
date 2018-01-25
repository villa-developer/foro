<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24-Jan-18
 * Time: 3:55 PM
 */

class CreatePostsTest extends FeatureTestCase
{
    public function test_a_user_create_post()
    {
        //having
        $title = 'Esta es una pregunta';
        $content = 'Este es el contenido';

        //when
        $this->actingAs($user = $this->defaultUser())
        ->visit(route('posts.create'))
        ->type($title, 'title')
        ->type($content, 'content')
        ->press('Publicar');

        //then
        $this->seeInDatabase('posts', [
            'title' => $title,
            'content' => $content,
            'pending' => true,
            'user_id' => $user->id
        ]);

        //test user redirect
        $this->see('h1', $title);
    }
}