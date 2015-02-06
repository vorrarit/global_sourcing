<?php

class AttachmentsController extends AppController {

    public $uses = array('Photo', 'Video', 'FileDocument', 'Product');

    public function index($productId = null) {

        if ($this->request->is('post')) {
            $productId = $this->request->data['Product']['id'];

            //-----------------------Add Photos----------------------//   
            $photos = $this->request->data['Product']['photo'];
            for ($i = 0; $i < count($photos); $i++) {
                $photo = $photos[$i];

                //pr($find);die();
                if ($this->isUploadedFilePhoto($photo)) {
                    $find = $this->Photo->find('first', array('order' => array('Photo.id' => 'DESC'), 'fields' => array('Photo.id')));
                    $id = (int) $find + 1;

                    $this->Photo->create();
                    $ext = pathinfo($photo['name'], PATHINFO_EXTENSION);
                    $photo['Photo']['photo_name'] = 'product_photo_' . $productId . '_' . $id . '.' . $ext;
                    $photo['Photo']['photo_path'] = '/img/Products/pics';
                    $photo['Photo']['photo_file_type'] = $photo['type'];
                    $photo['Photo']['product_id'] = $productId;

                    $this->Photo->save($photo);
                    $this->saveUploadFile($photo, 'img/Products/pics', 'product_photo_' . $productId . '_' . $id . '.' . $ext);
                }
            }
            //-----------------------End Photos------------------------//
            //-----------------------Add Videos-----------------------//
            $videos = $this->request->data['Product']['video'];
            for ($i = 0; $i < count($videos); $i++) {

                $video = $videos[$i];
                if ($this->isUploadedFileVideo($video)) {
                    $find = $this->Video->find('first', array('order' => array('Video.id' => 'DESC'), 'fields' => array('Video.id')));
                    $id = (int) $find + 1;

                    $this->Video->create();
                    $ext = pathinfo($video['name'], PATHINFO_EXTENSION);
                    $video['Video']['video_name'] = 'product_video_' . $productId . '_' . $id . '.' . $ext;
                    $video['Video']['video_path'] = '/img/Products/videos';
                    $video['Video']['video_file_type'] = $video['type'];
                    $video['Video']['product_id'] = $productId;
                    $this->Video->save($video);
                    $this->saveUploadFile($video, 'img/Products/videos', 'product_video_' . $productId . '_' . $id . '.' . $ext);
                }
            }
            //-----------------------End Videos-------------------------//
            //-----------------------Add FileDocument-------------------------//
            $docs = $this->request->data['Product']['file_doc'];
            for ($i = 0; $i < count($docs); $i++) {

                $doc = $docs[$i];
                if ($this->isUploadedFileDocument($doc)) {
                    $find = $this->FileDocument->find('first', array('order' => array('FileDocument.id' => 'DESC'), 'fields' => array('FileDocument.id')));
                    $id = (int) $find + 1;

                    $this->FileDocument->create();
                    $ext = pathinfo($doc['name'], PATHINFO_EXTENSION);
                    $doc['FileDocument']['file_doc_name'] = 'product_FileDocument_' . $productId . '_' . $id . '.' . $ext;
                    $doc['FileDocument']['file_doc_path'] = '/img/Products/docs';
                    $doc['FileDocument']['file_doc_type'] = $doc['type'];
                    $doc['FileDocument']['product_id'] = $productId;
                    $this->FileDocument->save($doc);
                    $this->saveUploadFile($doc, 'img/Products/docs', 'product_FileDocument_' . $productId . '_' . $id . '.' . $ext);
                }
            }

            $this->Session->setFlash(__('The Attachments has been saved.'), 'default', array('class' => 'alert alert-success'));

            return $this->redirect(array('action' => 'index', $productId));
        }

        $this->request->data['Product']['id'] = $productId;
    }

    public function isUploadedFilePhoto($field) {
        $map = array(
            'image/gif' => '.gif',
            'image/jpeg' => '.jpg',
            'image/png' => '.png'
        );
        if ((isset($field['error']) && $field['error'] == 0) ||
                (!empty($field['tmp_name']) && $field['tmp_name'] != 'none')
        ) {
            if (array_key_exists($field['type'], $map)) {
                return is_uploaded_file($field['tmp_name']);
            }
        }
        return false;
    }

    public function isUploadedFileVideo($field) {
        $map = array(
            'video/mp4' => '.mp4',
            'video/avi' => '.avi',
            'video/flv' => '.flv'
        );
        if ((isset($field['error']) && $field['error'] == 0) ||
                (!empty($field['tmp_name']) && $field['tmp_name'] != 'none')
        ) {
//            if (array_key_exists($field['type'], $map)) {
            return is_uploaded_file($field['tmp_name']);
//            }
        }
        return false;
    }

    public function isUploadedFileDocument($field) {
        $map = array(
            'imgDoc/pdf' => '.pdf',
            'imgDoc/jpeg' => '.jpg',
        );
        if ((isset($field['error']) && $field['error'] == 0) ||
                (!empty($field['tmp_name']) && $field['tmp_name'] != 'none')
        ) {
//            if (array_key_exists($field['type'], $map)) {
            return is_uploaded_file($field['tmp_name']);
//            }
        }
        return false;
    }

    public function saveUploadFile($field, $path, $fileName) {
        if (isset($field['error']) && $field['error'] == 0) {
            move_uploaded_file($field['tmp_name'], WWW_ROOT . $path . '/' . $fileName);
            return $path . '/' . $fileName;
        }

        return '';
    }

}
