<?php
require_once 'connection.php';
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
        body {
            font-family: 'Orbitron', Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: linear-gradient(135deg, #0a0a23 0%, #1a1a4d 100%);
            color: #ffffff;
            position: relative;
            overflow-x: hidden;
        }

        /* Starry background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg"><circle cx="10" cy="10" r="1" fill="white" opacity="0.3"/><circle cx="50" cy="50" r="2" fill="white" opacity="0.4"/><circle cx="80" cy="20" r="1" fill="white" opacity="0.3"/></svg>');
            background-repeat: repeat;
            opacity: 0.2;
            z-index: -1;
        }

        h1 {
            color: #00ffff;
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 0 0 10px #00ffff;
        }

        form {
            background: rgba(20, 20, 60, 0.8);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.3);
            margin-bottom: 30px;
            border: 1px solid #00ffff;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #ccffff;
            text-shadow: 0 0 5px #00cccc;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #00cccc;
            border-radius: 4px;
            background: rgba(0, 0, 50, 0.7);
            color: #ffffff;
            box-sizing: border-box;
            transition: box-shadow 0.3s;
        }

        input:focus {
            box-shadow: 0 0 10px #00ffff;
            outline: none;
        }

        button {
            background: linear-gradient(45deg, #00ffff, #00cccc);
            color: #000033;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            text-shadow: 0 0 5px #ffffff;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px #00ffff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(20, 20, 60, 0.8);
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.3);
            border: 1px solid #00ffff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid rgba(0, 255, 255, 0.2);
        }

        th {
            background: linear-gradient(45deg, #00cccc, #008888);
            text-shadow: 0 0 5px #ffffff;
        }

        tr:hover {
            background: rgba(0, 255, 255, 0.1);
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 15px;
            margin-right: 5px;
            transition: transform 0.3s;
        }

        a[href*="update"] {
            background: linear-gradient(45deg, #00ffff, #00cccc);
            color: #000033;
        }

        a[href*="delete"] {
            background: linear-gradient(45deg, #ff00ff, #cc00cc);
            color: #ffffff;
        }

        a:hover {
            transform: scale(1.1);
            box-shadow: 0 0 10px currentColor;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <h1>User Management</h1>
    <form action="insert.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Add User</button>
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>