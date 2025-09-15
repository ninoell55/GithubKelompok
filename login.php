<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom, #3f51b5, #a7b4feff);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    form {
      background: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
    input {
      display: block;
      margin-bottom: 15px;
      width: 220px;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 6px;
    }
    button {
      background: #3f51b5;
      color: white;
      border: none;
      padding: 10px;
      width: 100%;
      border-radius: 6px;
      cursor: pointer;
    }
    button:hover {
      background: #3748a5ff;
      color: white;
    }
  </style>
</head>
<body>
  <form action="proses_login.php" method="post">
    <h2>Login Admin</h2>
    <input type="text" name="username" placeholder="Username" required />
    <input type="password" name="password" placeholder="Password" required />
    <button type="submit">Login</button>
  </form>
</body>
</html>
