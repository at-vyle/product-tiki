## User Api

### `POST` Login
```
/api/login
```
Login User
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

#### Query Param
| Key | Value | Description |
|---|---|---|
| email | email | User's Email |
| password | password | User's Password |

#### Response
* _Error_
``` json
{
    "error": "Unauthorised",
    "code": 401
}
```

* _Success_
```json
{
    "result": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQ2ZDZhMWFmMjY4YTI1YjE3NmJmZTQ1Y2I1ZTNmZTI4NWNmZTFhY2U4NTU5M2YxZGYyNjUxMjg2MTI5MjEwNDljMmM0MWVhYTdlOGY1MzA0In0.eyJhdWQiOiIxIiwianRpIjoiNDZkNmExYWYyNjhhMjViMTc2YmZlNDVjYjVlM2ZlMjg1Y2ZlMWFjZTg1NTkzZjFkZjI2NTEyODYxMjkyMTA0OWMyYzQxZWFhN2U4ZjUzMDQiLCJpYXQiOjE1Mjg4NzQ0NTQsIm5iZiI6MTUyODg3NDQ1NCwiZXhwIjoxNTYwNDEwNDU0LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.aQGoSGzs4jY3zSHY0ULWc8dgiLaaR92KITD3N3RuJvzdNm01vPV33BsgiUxMa6efTla6oXaSn_fD_dL4JWrYZZ31lNRRcGmUklyJWRw-W5ET0VXGTjdOZrWw4Ji0MrMY8aYUgTGRsmGwT1bHvO19iiImjPnT9V84yEa9jwlOW6roelSNYTYyyPySbkJ9oBdyJL1G_oGkGgDpNdKExGTwldLhQ6n5LKi0FWQiq2huXc2d9tAu23evkVW-oJfsFJr8nEEUzkdBitgmNj0yfVD5eSO78-yN-izU9yaitFY1Ra2Dx2XaU3j0jNr4Nf4MfsNgGvjKiOqKEtT9YINLoOPm2hF147c14OhDjRl3Z6Z4eNQWKIYH5dsBalNgeuU8-6SO0G0z54nlr8KzsCRoLCwadogQlvMnO11wtYvCjlNXHbXvR6yX5JfPKMb2ZirW9-Ze-OiNuofBjqzV9zNzjoqtj-HFuGtRn7_AM_6NXF5ecG73IbOqdqLC-YssV7Jmp9cxG9OgJDrqQkNPtSCSQuvCpZDjyOJbTnlMIikXyu8HZ4dOVvEUdl0hWFKc-nHBhUc9qNaweivDgQF0EmsJ02h4QK9lAC93q0eiS4TVo9UO5duL2lZxWkt4tfVpOx3gEKc_TMp1v8zSZm3wnwy5K5NIXVdDC0o8yn1mY9yUnsFEPmY",
        "user": {
            "id": 1,
            "username": "hank30",
            "email": "floy.miller@example.org",
            "old_password": "",
            "is_active": 0,
            "role": 0,
            "last_logined_at": "2018-06-13 07:20:49",
            "created_at": "2018-06-12 09:07:04",
            "updated_at": "2018-06-13 07:20:49",
            "deleted_at": null,
            "user_info": {
                "id": 5,
                "user_id": 1,
                "full_name": "Electa Schaden",
                "avatar": "img.jpg",
                "gender": 1,
                "dob": "2006-12-18",
                "address": "941 Farrell Key Suite 482\nGraciehaven, MD 07084",
                "phone": "920-218-4018 x920",
                "identity_card": "128604325",
                "created_at": "2018-06-12 09:07:15",
                "updated_at": "2018-06-12 09:07:15"
            }
        }
    },
    "code": 200
}
```

### `POST` Logout
```
/api/logout
```
Logout user
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer $token

#### Response
* _Success_


### `POST` Register
```
/api/register
```
Register user

#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

#### Query Param
| Key | Value | Description |
|---|---|---|
| username | text | Username |
| email | email | User's Email |
| password | password | User's Password |
| full_name | text | Full Name |
| address | text | Address |
| gender | number | 0 for Male 1 for Female |
| phone | number | Phone |
| identity_card | number | ID card |

#### Response
* _Error_
``` json
{
    "message": "The given data was invalid.",
    "errors": {
        "username": [
            "The username has already been taken."
        ],
        "email": [
            "The email has already been taken."
        ],
        "identity_card": [
            "The identity card has already been taken."
        ]
    },
    "code": 422,
    "request": {
        "username": "abcde",
        "email": "abc@abc.abcde",
        "password": "123456789",
        "full_name": "dsahdkjashd djaskdaskjdh",
        "address": "1231 sjhdkshdaksh",
        "gender": "1",
        "phone": "1234567890",
        "identity_card": "145789865"
    }
}
```

* _Success_
``` json
{
    "result": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjJmZjIzMzRmM2Q3ZDg0ZWQxMWIyZWFjNmE5ZTVlNTNkMmE2NmI2YWRkMzY0NGIzNDlkMmZkMGQ3MmQzNTdiM2UyMmQ1MjEzYzM2ZjExM2JmIn0.eyJhdWQiOiIxIiwianRpIjoiMmZmMjMzNGYzZDdkODRlZDExYjJlYWM2YTllNWU1M2QyYTY2YjZhZGQzNjQ0YjM0OWQyZmQwZDcyZDM1N2IzZTIyZDUyMTNjMzZmMTEzYmYiLCJpYXQiOjE1Mjg4ODEwMDIsIm5iZiI6MTUyODg4MTAwMiwiZXhwIjoxNTYwNDE3MDAxLCJzdWIiOiIxOCIsInNjb3BlcyI6W119.i_7h910vahjYqrYKLrBV0foKZ3-D89vCqNYtzePbJXWka6doC8PsrQxsuRLIyN2pmTAuMtH8ypF3z9QR25z7QWOaV09QsHIyQcIvSPIMr4toXB4j9rfareH2xmtGFLsDH186b7iwsuDU-nCykzdgJnTiSLMfNKuk2bE4igMDc8czeytvf2Dp2fx2piMYyvrx3ShVbx1x3d-udF31zYJv8fQhls0Ez6lG4egBgv42Lnse585_P3smF10sD8olpqAoFc0YnZKxPBJnkK6JfigOPpI0mDNOfBTh97UGtpjqIsscr1hwp-qvAzdGw4Pzh9PcT8ABpJH6erQwK9xp9toGi6new-LGXTFacO_stv6bitawN5N9pXW7yazJVimPsHFoCrSCIfnVaBBqfw-JCZRaPM0oBwwEdHETepnzvF1SDAGjHFEU2b7VbOmB_bdM3yA-MCS-iGZ2rk_KwKGSzPm2jOwGIreSPG3RLyx4A2k6-JNxXxVsqvZqyLQM31q50x4YvTMwhOTuqY1S1bThxVABFN9-EWyuEslRS76dvY9B2k0p9T9WUH18D5V6ngcf3PC_WP56Wt0p8qNTdAgHw6GOllyOnMytxNmgO0I1LknXr4Lrm2oveI8Zivutsp3zfiQqg_NAhDeGlYKftmesFNrSArawUoLesZNfbQr1Y4Pz5jc",
        "user": {
            "username": "abcde",
            "email": "abc@abc.abcde",
            "updated_at": "2018-06-13 09:10:01",
            "created_at": "2018-06-13 09:10:01",
            "id": 18,
            "user_info": {
                "id": 14,
                "user_id": 18,
                "full_name": "dsahdkjashd djaskdaskjdh",
                "avatar": null,
                "gender": 1,
                "dob": null,
                "address": "1231 sjhdkshdaksh",
                "phone": "1234567890",
                "identity_card": "145789865",
                "created_at": "2018-06-13 09:10:01",
                "updated_at": "2018-06-13 09:10:01"
            }
        }
    },
    "code": 200
}
```
