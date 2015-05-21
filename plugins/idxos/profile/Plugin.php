<?php namespace Idxos\Profile;

use System\Classes\PluginBase;
use RainLab\User\Models\User as UserModel;
use RainLab\User\Controllers\Users as UsersController;
use Idxos\Profile\Models\Profile as ProfileModel;


/**
 * Profile Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Profile',
            'description' => 'No description provided yet...',
            'author'      => 'Idxos',
            'icon'        => 'icon-leaf'
        ];
    }

    public function boot() 
    {

        UserModel::extend(function($model) {
            $model->hasOne['profile'] = ['Idxos\Profile\Models\Profile'];
        });

        UsersController::extendFormFields(function($form, $model, $context)
        {
            
            if (!$model instanceof UserModel)
                return;

            if (!$model->exists)
                return;

            //  Ensures that a profile model always exists ...
            ProfileModel::getFromUser($model);

            $form->addTabFields 
            {[
                
                'profile[headline]' => [
                    'label' => 'Headline',
                    'tab' => 'Profile'
                ],
                'profile[about_me]' => [
                    'label' => 'About Me',
                    'tab' => 'Profile'
                ],
                'profile[interests]' => [
                    'label' => 'Interests',
                    'tab' => 'Profile'
                ],
                'profile[books]' => [
                    'label' => 'Books',
                    'tab' => 'Profile'
                ],
                'profile[music]' => [
                    'label' => 'Music',
                    'tab' => 'Profile'
                ]

            ]};
        });

    }

}
