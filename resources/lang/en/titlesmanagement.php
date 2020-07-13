<?php

return [

    // Titles
    'showing-all-titles'     => 'Showing All Titles',
    'titles-menu-alt'        => 'Show Titles Management Menu',
    'create-new-title'       => 'Create New Title',
    'show-deleted-titles'    => 'Show Deleted Title',
    'editing-title'          => 'Editing Title :name',
    'showing-title'          => 'Showing Title :name',
    'showing-title-title'    => ':name\'s Information',

    // Flash Messages
    'createSuccess'   => 'Successfully created title! ',
    'updateSuccess'   => 'Successfully updated title! ',
    'deleteSuccess'   => 'Successfully deleted title! ',
    'deleteSelfError' => 'You cannot delete yourself! ',

    // Show Title Tab
    'viewProfile'            => 'View Profile',
    'editTitle'               => 'Edit Title',
    'deleteTitle'             => 'Delete Title',
    'titlesBackBtn'           => 'Back to Titles',
    'titlesPanelTitle'        => 'Title Information',
    'labelUserName'          => 'Username:',
    'labelEmail'             => 'Email:',
    'labelFirstName'         => 'First Name:',
    'labelLastName'          => 'Last Name:',
    'labelRole'              => 'Role:',
    'labelStatus'            => 'Status:',
    'labelAccessLevel'       => 'Access',
    'labelPermissions'       => 'Permissions:',
    'labelCreatedAt'         => 'Created At:',
    'labelUpdatedAt'         => 'Updated At:',
    'labelIpEmail'           => 'Email Signup IP:',
    'labelIpConfirm'         => 'Confirmation IP:',
    'labelIpSocial'          => 'Socialite Signup IP:',
    'labelIpAdmin'           => 'Admin Signup IP:',
    'labelIpUpdate'          => 'Last Update IP:',
    'labelDeletedAt'         => 'Deleted on',
    'labelIpDeleted'         => 'Deleted IP:',
    'titlesDeletedPanelTitle' => 'Deleted Title Information',
    'titlesBackDelBtn'        => 'Back to Deleted Titles',

    'successRestore'    => 'Title successfully restored.',
    'successDestroy'    => 'Title record successfully destroyed.',
    'errorTitleNotFound' => 'Title not found.',

    'labelUserLevel'  => 'Level',
    'labelUserLevels' => 'Levels',

    'titles-table' => [
        'caption'      => '{1} :titlescount title total|[2,*] :titlescount total titles',
        'id'           => 'ID',
        'title'        => 'Title',
        'created'      => 'Created',
        'updated'      => 'Updated',
        'actions'      => 'Actions',
    ],

    'buttons' => [
        'create-new'    => 'New Title',
        'delete'        => '<i class="fa m-0 fa-trash fa-fw" aria-hidden="true"></i>',
        'show'          => '<i class="fa m-0 fa-eye fa-fw" aria-hidden="true"></i>',
        'edit'          => '<i class="fa m-0 fa-pencil-alt fa-fw" aria-hidden="true"></i>',
        'back-to-titles' => '<span class="hidden-sm hidden-xs">Back to </span><span class="hidden-xs">Titles</span>',
        'back-to-title'  => 'Back  <span class="hidden-xs">to Title</span>',
        'delete-title'   => '<i class="fa fa-trash fa-fw" aria-hidden="true"></i>  <span class="hidden-xs">Delete</span><span class="hidden-xs"> Title</span>',
        'edit-title'     => '<i class="fa fa-pencil-alt fa-fw" aria-hidden="true"></i> <span class="hidden-xs">Edit</span><span class="hidden-xs"> Title</span>',
    ],

    'tooltips' => [
        'delete'        => 'Delete',
        'show'          => 'Show',
        'edit'          => 'Edit',
        'create-new'    => 'Create New Title',
        'back-titles'    => 'Back to titles',
        'email-title'    => 'Email :title',
        'submit-search' => 'Submit Titles Search',
        'clear-search'  => 'Clear Search Results',
    ],

    'messages' => [
        'userNameTaken'          => 'Username is taken',
        'userNameRequired'       => 'Username is required',
        'fNameRequired'          => 'First Name is required',
        'lNameRequired'          => 'Last Name is required',
        'emailRequired'          => 'Email is required',
        'emailInvalid'           => 'Email is invalid',
        'passwordRequired'       => 'Password is required',
        'PasswordMin'            => 'Password needs to have at least 6 characters',
        'PasswordMax'            => 'Password maximum length is 20 characters',
        'captchaRequire'         => 'Captcha is required',
        'CaptchaWrong'           => 'Wrong captcha, please try again.',
        'roleRequired'           => 'Title role is required.',
        'title-creation-success'  => 'Successfully created title!',
        'update-title-success'    => 'Successfully updated title!',
        'delete-success'         => 'Successfully deleted the title!',
        'cannot-delete-yourself' => 'You cannot delete yourself!',
    ],

    'show-title' => [
        'id'                => 'Title ID',
        'name'              => 'Username',
        'email'             => '<span class="hidden-xs">Title </span>Email',
        'role'              => 'Title Role',
        'created'           => 'Created <span class="hidden-xs">at</span>',
        'updated'           => 'Updated <span class="hidden-xs">at</span>',
        'labelRole'         => 'Title Role',
        'labelAccessLevel'  => '<span class="hidden-xs">Title</span> Access Level|<span class="hidden-xs">Title</span> Access Levels',
    ],

    'search'  => [
        'title'             => 'Showing Search Results',
        'found-footer'      => ' Record(s) found',
        'no-results'        => 'No Results',
        'search-titles-ph'   => 'Search Titles',
    ],

    'modals' => [
        'delete_title_message' => 'Are you sure you want to delete :title?',
    ],
];
