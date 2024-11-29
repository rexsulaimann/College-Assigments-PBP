<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>REGISTER</h2>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 8px;
        vertical-align: top;
    }

    label {
        font-weight: bold;
    }

    input[type="text"], input[type="password"], input[type="number"], input[type="email"], input[type="tel"], input[type="date"] {
        width: 100%;
        padding: 8px;
        margin: 0;
        box-sizing: border-box;
    }

    button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #003366;
        color: #eecc11;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #333;
        color: #fff;
    }
</style>

<form action="prc_insert.php" method="POST">
    <table>
        <tr>
            <td><label>Nama Depan:</label></td>
            <td><input type="text" name="first_name" required></td>
        </tr>
        <tr>
            <td><label>Nama Belakang:</label></td>
            <td><input type="text" name="last_name" required></td>
        </tr>
        <tr>
            <td><label>Username:</label></td>
            <td><input type="text" name="username" required></td>
        </tr>
        <tr>
            <td><label>Password:</label></td>
            <td><input type="password" name="password" required></td>
        </tr>
        <tr>
            <td><label>Usia:</label></td>
            <td><input type="number" name="age" required></td>
        </tr>
        <tr>
            <td><label>Jenis Kelamin:</label></td>
            <td><input type="text" name="gender" required></td>
        </tr>
        <tr>
            <td><label>Tempat Tanggal Lahir:</label></td>
            <td><input type="date" name="birth_date" required></td>
        </tr>
        <tr>
            <td><label>Email:</label></td>
            <td><input type="email" name="email" required></td>
        </tr>
        <tr>
            <td><label>Nomor Telepon:</label></td>
            <td><input type="tel" name="phone" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <button type="submit">Input</button>
            </td>
        </tr>
    </table>
</form>

</body>
</html>