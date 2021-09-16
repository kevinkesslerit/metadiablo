<?php
namespace App;

class UserAuth {
   const isUnverifiedUser = 0;
   const isBanned = 0;
   const isAdmin = 1;
   const isModerator = 2;
   const isSubModerator = 4;
   const isEditor = 8;
   const isSubEditor = 16;
   const isUser = 64;
   const isSubUser = 128;
}