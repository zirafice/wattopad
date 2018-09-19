<?php
require_once('Db.php');
Db::connect('127.0.0.1', 'testdb', 'root', '');
                if (isset($_GET['r']) && isset($_GET['id']))
                {
                    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                            } else {
                                $ip = $_SERVER['REMOTE_ADDR'];
                            }    
                    $existuje = Db::querySingle('
                        SELECT COUNT(*)
                        FROM rating
                        WHERE pribeh_id=? AND IP=?
                        LIMIT 1
                ', $_GET['id'], $ip);
                if ($existuje)
                    {
                    Db::query('
                        UPDATE rating
                        SET vote=?
                        WHERE pribeh_id=? AND IP=?
                        ', $_GET['r'], $_GET['id'], $ip);
                    }
                else
                {
                    Db::query('
                        INSERT INTO rating (pribeh_id, IP, vote)
                                VALUES (?, ?, ?)
                        ', $_GET['id'], $ip, $_GET['r']);
                }
                $rating = Db::queryAll('
                    SELECT AVG(vote)
                    FROM rating
                    WHERE pribeh_id=?
                    ', $_GET['id']);
                $ratio = ($rating[0]);
                Db::query('
                        UPDATE clanky
                        SET ratio=?
                        WHERE clanek_id=?
                        ', $ratio['AVG(vote)'], $_GET['id']);
                }
                header('Location: detail.php?detail=' . $_GET['id']);
//              Header změnit podle potřeby
                exit();
                ?>
