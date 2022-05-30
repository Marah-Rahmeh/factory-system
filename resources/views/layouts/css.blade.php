<style>
.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #9C27B0;
    color: white;
    text-align: center;
}
.table .show{
    color:darkgray;
}
.table .edit{
    color:mediumblue;
}
.table .delete{
    color:firebrick;
}
.table .add{
    color:darkgoldenrod;
}
.table .add{
  margin-left: 17px;
}
.first-1 {
background-color: white !important
}

.content-header .breadcrumb>li+li:before {
content: "" !important
}

.content-header .breadcrumb {
padding: 25px;
color: #aaa !important;
letter-spacing: 2px;
border-radius: 5px !important
}

.content-header .breadcrumb a {
text-decoration: none !important;
color:black !important;
 padding-right: 10px !important;
 padding-left: 10px !important;

}
.active-2 {
padding-bottom: 12px !important;
padding-top: 12px !important;
padding-right: 30px !important;
padding-left: 30px !important;
border-radius: 100px !important;

}
.table th{
background-color:#4723D9;
/* 234dd9 */
color: white;
}

body{
margin-top:20px;
background:#f5f5f5;
}
/**
* Panels
*/
/*** General styles ***/
.panel {
box-shadow: none;
}
.panel-heading {
border-bottom: 0;
}
.panel-title {
font-size: 17px;
}
.panel-title > small {
font-size: .75em;
color: #999999;
}
.panel-body *:first-child {
margin-top: 0;
}
.panel-footer {
border-top: 0;
}

.panel-default > .panel-heading {
color: #333333;
background-color: transparent;
border-color: rgba(0, 0, 0, 0.07);
}

form label {
color: #999999;
font-weight: 400;
}

.form-horizontal .form-group {
margin-left: -15px;
margin-right: -15px;
}
@media (min-width: 768px) {
.form-horizontal .control-label {
text-align: right;
margin-bottom: 0;
padding-top: 7px;
}
}

.profile__contact-info-icon {
float: left;
font-size: 18px;
color: #999999;
}
.profile__contact-info-body {
overflow: hidden;
padding-left: 20px;
color: #999999;
}
.profile-avatar {
width: 200px;
position: relative;
margin: 0px auto;
margin-top: 196px;
border: 4px solid #f3f3f3;
}
.her{
margin-top: 20px;
margin-bottom: 20px;
}
/*start sedbar*/
@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

:root {

    --nav-width: 68px;
    --first-color: #4723D9;
    --first-color-light: #AFA5D9;
    --white-color: #F7F6FB;
    --body-font: 'Nunito', sans-serif;
    --normal-font-size: 1rem;
    --z-fixed: 100
}

*,
::before,
::after {
    box-sizing: border-box
}

body {
    position: relative;
    margin: var(--header-height) 0 0 0;
    padding: 0 1rem;
    font-family: var(--body-font);
    font-size: var(--normal-font-size);
    transition: .5s
}

a {
    text-decoration: none
}

.header {
    width: 100%;
    height: var(--header-height);
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 1rem;
    background-color: var(--white-color);
    z-index: var(--z-fixed);
    transition: .5s
}

.header_toggle {
    color: var(--first-color);
    font-size: 1.5rem;
    cursor: pointer
}

.header_img {
    width: 35px;
    height: 35px;
    display: flex;
    justify-content: center;
    border-radius: 50%;
    overflow: hidden
}

.header_img img {
    width: 40px
}

.l-navbar {
    position: fixed;
    top: 0;
    left: -30%;
    width: var(--nav-width);
    height: 100vh;
    background-color: var(--first-color);
    padding: .5rem 1rem 0 0;
    transition: .5s;
    z-index: var(--z-fixed)
}

.nav {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden
}

.nav_logo,
.nav_link {
    display: grid;
    grid-template-columns: max-content max-content;
    align-items: center;
    column-gap: 1rem;
    padding: .5rem 0 .5rem 1.5rem
}

.nav_logo {
    margin-bottom: 2rem
}

.nav_logo-icon {
    font-size: 1.25rem;
    color: var(--white-color)
}

.nav_logo-name {
    color: var(--white-color);
    font-weight: 700
}

.nav_link {
    position: relative;
    color: var(--first-color-light);
    margin-bottom: 1.5rem;
    transition: .3s
}

.nav_link:hover {
    color: var(--white-color)
}

.nav_icon {
    font-size: 1.25rem
}

.show {
    left: 0
}

.body-pd {
    padding-left: calc(var(--nav-width) + 1rem)
}

.active {
    color: var(--white-color)
}

.active::before {
    content: '';
    position: absolute;
    left: 0;
    width: 2px;
    height: 32px;
    background-color: var(--white-color)
}

.height-100 {
    height: 100vh
}

@media screen and (min-width: 768px) {
    body {
        margin: calc(var(--header-height) + 1rem) 0 0 0;
        padding-left: calc(var(--nav-width) + 2rem)
    }

    .header {
        height: calc(var(--header-height) + 1rem);
        padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
    }

    .header_img {
        width: 40px;
        height: 40px
    }

    .header_img img {
        width: 45px
    }

    .l-navbar {
        left: 0;
        padding: 1rem 1rem 0 0
    }

    .show {
        width: calc(var(--nav-width) + 156px)
    }

    .body-pd {
        padding-left: calc(var(--nav-width) + 188px)
    }
    #btn-save{
        margin-top: 20px;
    }
    .w-100{
        margin-bottom: 20px;
    }
  .ed1 .ed {
  margin-left: 400px;
    }
   .row .card .text2{
        padding-left: 10px;
        margin-left: 20px;

    }
   .ph{
       margin-top: 60px;
   }
   .count1{
       margin-top: 80px;

   }
</style>
