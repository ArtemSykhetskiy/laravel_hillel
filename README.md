## Laravel Shop

Створення інтернет магазину на Laravel з наступним функціоналом:

- Функціонал реєстрації/авторизації
- Розподілення ролей на адміна та користувача
- Адмін панель
  - Створення/редагування товарів та категорій (CRUD оперпції)
  - Керування замовленнями
  - Сповіщення про надходження нових замовлень
  - Генерація інвойсів
  - Підключення AWS S3 для збереження інвойсів на сервіс
- Список побажань(прив'язується по базі даних)
- Функціонал корзини
- При замовленні, користувачу приходить сповіщення на email
- При зміні статусу замовлення, користувачу приходить сповіщення на Telegram (використання патерну Observer та черг)
- Кабінет користувача
  - Перегляд історії замовлень
  - Дані користувача
  - Підключення Telegram
  - Генерація API токена
- Фільтр товарів(по ціні, сортування по ціні та назві)
- Сповіщення про заміну замовлення на Telegram
- Відправлення інвойсів на Telegram
- API
   - Генерація токенів (розподілення доступу для адміна та користувачів)
   - Робота з API

За верстку сайту взято безкоштовні Bootstrap шаблони! Головна мета: реалізація бекенд частини сайту, тому в деяких місцях верстка може бути кривою
