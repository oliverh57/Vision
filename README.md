# Vision
#### A front end network camera viewer with snapshot support and built in reverse proxy.

Vision is a front end for many common network cameras that enables you to: 
  - Password protect cameras and access them outside of your local network
  - encrypt their stream
  - take snapshots and view them all from the webclient

### New features in 1.2.1
Add optional ReCaptcha verification to login page as well as orgnisation.
 
### Installation instructions

* You will need to install a web sever, with PHP installed. (PHP 5 or 7)
* Clone the repository to your web directory using the command ``$ git clone https://github.com/oliverh57/Vision.git``.
* Edit the file `/setup/config.php` with information about your cameras and decide on an encryption key and username / password.
  * If you are using this programs built in suport for reCAPTCHA V2.0 follow the guide [here](https://www.google.com/recaptcha/intro/android.html) on how to genrate your own set of keys.
* your camera viewer should now be fully operational.



### Side Note
> This software is designed as a front end for cheap network cameras. For full operation with no modification it is advised that you use [MotionEye](https://github.com/ccrisan/motioneye). This code can easily be adapted however for operation with other cameras; see the guide on adapting this code [here](#)


## change log

### 1.2.1
Files tidied up.

### 1.2.0
Add optional ReCaptcha verification to login page.

### 1.1.0
Large Update to the way cameras are handled. The number of cameras can be dynamicly scaled.

### 1.0.1
Bug fixes

### 1.0.0
First Public release including many features such as:
  - Snapshot support
  - more simple install

### Attribution
This code had been developed by **Oliver Hynds**, **Robert Bradshaw** and **Ben Griffiths** - 09/10/2017
