<?php

function bot_sendMessage($user_id, $data)
{
    $users_get_response = vkApi_usersGet($user_id);
    $user = array_pop($users_get_response);

    require_once BOT_BASE_DIRECTORY . '/VkBot.php';
    $vkBot = new VkBot();
    $msg = $vkBot->vk($data);

    if ($msg[0] == 1) {
        $photo = _bot_uploadPhoto($user_id, BOT_BASE_DIRECTORY . '../' . $msg[2]);

        $attachments = array(
            'photo' . $photo['owner_id'] . '_' . $photo['id'],
        );
    } else {
        $attachments = [];
    }
    vkApi_messagesSend($user_id, $msg[1], $attachments);
}

function _bot_uploadPhoto($user_id, $file_name)
{
    $upload_server_response = vkApi_photosGetMessagesUploadServer($user_id);
    $upload_response = vkApi_upload($upload_server_response['upload_url'], $file_name);

    $photo = $upload_response['photo'];
    $server = $upload_response['server'];
    $hash = $upload_response['hash'];

    $save_response = vkApi_photosSaveMessagesPhoto($photo, $server, $hash);
    $photo = array_pop($save_response);

    return $photo;
}

function _bot_uploadVoiceMessage($user_id, $file_name)
{
    $upload_server_response = vkApi_docsGetMessagesUploadServer($user_id, 'audio_message');
    $upload_response = vkApi_upload($upload_server_response['upload_url'], $file_name);

    $file = $upload_response['file'];

    $save_response = vkApi_docsSave($file, 'Voice message');
    $doc = array_pop($save_response);

    return $doc;
}
