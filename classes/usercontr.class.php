<?php

class UserContr extends UserModel {
    public function getAdmins() {
        return $this->getUsersOfRole(1);
    }

    public function getWriters() {
        return $this->getUsersOfRole(2);
    }

    public function getReaders() {
        return $this->getUsersOfRole(3);
    }
}