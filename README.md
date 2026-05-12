# Smart Magazine

A PHP magazine platform for publishing and reading issues, managing submissions, and guiding authors through structured article flows—including a scientific-article wizard with draft storage.

## Features

- Magazine-style browsing, archives, and article pages (Smarty templates)
- User accounts, submissions, and editorial workflows
- Scientific article builder (multi-step wizard) with optional separate MySQL database for drafts
- Multi-site style routing via host-based `web_settings` and Apache rewrite rules

## Requirements

- PHP 7.4+ (with PDO MySQL)
- MySQL 5.7+ / MariaDB
- Apache with `mod_rewrite` (see `.htaccess`)

## Quick start

1. **Clone**

   ```bash
   git clone https://github.com/abbasrezaey1/smart-magazine.git
   cd smart-magazine
   ```

2. **Database**

   - Create a MySQL database and user with full privileges on that database.
   - Import the bundled snapshot (schema and data):

     ```bash
     mysql -u your_user -p your_database < database.sql
     ```

     The file `database.sql` is a mysqldump of the reference database. For only the scientific-article drafts table on an existing DB, you can instead run `sql/article_builder_drafts.sql`.

   **Note:** A dump may include user or site data from development. For a public fork, consider stripping or anonymizing rows before sharing.

3. **Configuration**

   ```bash
   cp lib/sql_connect.example.php lib/sql_connect.php
   ```

   Edit `lib/sql_connect.php`: set `$servername`, `$database`, `$username`, `$password`, and `CLAMA_ARTICLE_PUBLISH_WEB_ID` to match your deployment. Optionally set `$database_article_builder` if drafts live in a second database.

4. **Web server**

   Point the document root at this directory. Ensure `mod_rewrite` is enabled so requests flow to `index.php`.

5. **Permissions**

   The app must be able to write Smarty compiled templates to `templates_c/` (create the folder if missing and make it writable by the web user).

## Project layout

| Path | Role |
|------|------|
| `index.php` | Front controller and routing |
| `lib/` | PHP includes (DB, helpers, scientific article logic) |
| `templates/` | Smarty `.tpl` views |
| `libs/` | Smarty library |
| `database.sql` | Full MySQL dump for local setup |
| `sql/` | SQL snippets for optional tables |
| `css/`, `js/`, `plugins/` | Front-end assets |

## Security note

Never commit `lib/sql_connect.php`. Only `lib/sql_connect.example.php` belongs in Git. If credentials were ever committed elsewhere, rotate the database password.

## License

This project is licensed under the [MIT License](LICENSE).
