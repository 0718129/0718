# Project Overview

This PHP website will be an ecommerce site to sell handmade star wars memorabilia.

## User Management
Users will be able to login, log out, reset their passwords, and edit their details.

Users will need to store:
- Name
- DOB
- Hashed password
- Access Level (user vs Administrator)
- Status (active or disabled)

```mermaid
journey
title Login / Log off
    section Login
        Load main (home) page: 5: Unauthenticated User
        Enter login details: 5: Unauthenticated User
        Press Login Button: 5: Unauthenticated User
    section Registered
        Perform site Actions:5: Authenticated User
    section Logoff
        Press Logoff Button in Navbar:5: Authenticated User
        Close Browser:5: Unauthenticated User
```




```mermaid
journey
	title User Journey
    section Login
        Load main (home) page: 5: Unauthenticated User
        Enter login details: 5: Unauthenticated User
        Press Login Button: 5: Unauthenticated User
```



![](/home/christian/Downloads/main.png)

