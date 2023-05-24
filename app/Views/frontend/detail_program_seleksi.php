<?= $this->extend('frontend\layout') ?>
<?= $this->section('content') ?>
<?= html_entity_decode($detail['content']) ?>
<?= $this->endSection() ?>
