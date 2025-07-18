# Agent Coding Standards

Follow these instructions when updating or creating files in this repository.

## Project Overview

This project is a PHP/CodeIgniter application that reports customer service uptime using data from LibreNMS. It relies on MySQL for storage and Bootstrap for the front end. Authentication is done via a LibreNMS API token stored in a `.env` file.

## Development Guidelines

- Code must be written in **PHP** following **PSR-12** style conventions.
- Structure any new logic according to CodeIgniter's MVC pattern (use `Controllers`, `Models`, `Views`).
- Place sensitive information such as the LibreNMS API token in `.env`; never commit this file.
- When adding new features, keep them performance-friendly and mindful of API rate limits.
- Keep commit messages in **English** and use descriptive summaries.
- Provide database migrations for MySQL whenever schema changes are introduced.
- Commits must not contain binary files.

## Testing

Currently the repository contains no automated tests, but if a test suite is added, run it with `composer test` (or `phpunit`) before committing.

