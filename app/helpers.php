<?php 

if (! function_exists('avatar')) {
    function avatar($userEntity) {
        $image = $userEntity->getFirstMediaUrl('user-'. $userEntity->id, 'avatar');
        
        if (! empty($image)) {
            return $image;
        }
        
        return Avatar::create($userEntity->name)->toBase64();
    }
}