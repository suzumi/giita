<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('tags')->truncate();

        DB::table('tags')->insert([
            [
                'tag'      => 'Scala',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'PHP',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => '週報',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Ruby',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Ruby on Rails',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Java',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'C',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'C++',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'C#',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Erlang',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Haskell',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Lisp',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'CommonLisp',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'JavaScript',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'HTML',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'CSS',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Python2',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Python3',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => '手順書',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Git',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'vue.js',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Laravel',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'MySQL',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Vagrant',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Docker',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Linux',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Node.js',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'AngularJS',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Backborn.js',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Grunt',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'gulp.js',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'jQuery',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Nginx',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Objective-C',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'デザイン',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'React.js',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'ShellScript',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Bash',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Go',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => '関数型プログラミング',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'AWS',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'MongoDB',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Heroku',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Ansible',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Perl',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Playframework',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'spray',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Unity',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Swift',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Android',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'iOS',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Chef',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Selenium',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => '機械学習',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'マーケティング',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Sublime Text',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
            [
                'tag'      => 'Underscore.js',
                'created_at' => '2015-05-09 00:00:00',
                'updated_at' => '2015-05-09 00:00:00',
            ],
        ]);

    }

}
