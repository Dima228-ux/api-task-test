## Backend
1. Копируем .env.example в .env
2.  Скачиваем зависимости

        composer install
3.  Создаем базу данных

        CREATE USER "api-task" WITH PASSWORD '12345';
        CREATE DATABASE "api-task" WITH OWNER 'api-task';
4.  Запускаем миграции базы данных:

        php artisan migrate
5.  Запускаем сидеры:

        php artisan db:seed

6.  Генерируем ключ приложения:

        php artisan key:generate

7.  Запускаем сервер

        php artisan serve
8. Добавление задачи: METHOD: POST; URL:http://127.0.0.1:8000/api/task

   request:
      ```json 
   {
    "name": "test task4",
    "status": "new",
    "date_expiration":  "06.08.2024 10:10",
    "description": "vfcvcfb"
   }
   ``` 
   response:
   ```json 
    {
    "task": {
        "id": 6,
        "description": "vfcvcfb",
        "status": "new",
        "name": "test task4",
        "date_expiration": "2024-08-06 10:10:00"
    }
   }

9. Обновление задачи:METHOD: PUT; URL: http://127.0.0.1:8000/api/task

   request:
   ```json 
   {
    "id": 6,
    "name": "test task4",
    "status": "new",
    "date_expiration":  "06.08.2024 10:10",
    "description": "vfcvcfb2"
   }
   ```
   response:
   ```json
   {
    "task": {
        "id": 6,
        "description": "vfcvcfb2",
        "status": "new",
        "name": "test task4",
        "date_expiration": "2024-08-06 10:10:00"
    }
   }
   ```
10. Получение всех задач
    METHOD: GET; URL: http://127.0.0.1:8000/api/task

response:
  ```json
{
    "success": true,
    "data": [
        {
            "id": 4,
            "description": "срочно2",
            "status": "new2",
            "name": "test task",
            "date_expiration": "2024-07-06 10:10:00"
        },
        {
            "id": 5,
            "description": "vfcvcfb",
            "status": "new",
            "name": "test task3",
            "date_expiration": "2024-08-06 10:10:00"
        },
        {
            "id": 6,
            "description": "vfcvcfb2",
            "status": "new",
            "name": "test task4",
            "date_expiration": "2024-08-06 10:10:00"
        }
    ]
}
```

11. Поиск задачи по дате окнчания и статусу
    METHOD: GET; URL: http://127.0.0.1:8000/api/task/search?status=new2&date_expiration=2024-07-06 10:10:00

response:
   ```json
  {
    "success": true,
    "data": [
        {
            "id": 4,
            "description": "срочно2",
            "status": "new2",
            "name": "test task",
            "date_expiration": "2024-07-06 10:10:00"
        }
    ]
}
   ```

12. Удаление задачи:
    METHOD: DELETE; URL: http://127.0.0.1:8000/api/task/6

    response:

```json
{
    "status": "success"
}
```



