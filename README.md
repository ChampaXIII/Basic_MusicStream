# HexChess
Website to play hexagonal chess
Target: chess players

## Functions
* Log in
* Log out
* Start a local game
* Open an online room
* Close an online room
* Give up
* Offer draw
* Accept draw
* Move piece



## AR
![HexagonalChess](/Assets/schemaER.png)

## DR
- Account(__ID__, nickname, mail, a_name, a_srname, password);
- Admin (__Account_ID__);
- Utente (__Account_ID__);
- Torneo (__ID__, t_nome, __Admin_Account_ID__);
- Partita (__p1__, __p2__, __date__, __hour__);
- (__Utente_Account_ID__, __Torneo_ID__);
- 

## Mocup


### Ispirations
1. ![Chess.com](/Assets/Chess-com.png)
2. ![HexagonalChess](/Assets/HexagonalChess.png)

### Checkpoints
#### Stage 1
- [ ] Playable chess board (2P local)
- [ ] Move-history
- [ ] Make it responsive

#### Stage 2
- [ ] User log in
- [ ] Match history

#### Stage 3
- [ ] User score
- [ ] Online matches
- [ ] Online leaderboard

#### Stage 4
- [ ] Make a Home page
- [ ] Host it

#### Stage 5
- [ ] Watch old games
- [ ] Explane the rules































* Play localy (2 player from the same browser)
* Play online (2 plater from diffrent browsers)
* Watch old games (Hav acces to old game move list and, by selecting a move, show the game, apeaces, state on the board)
* User login
* Credential recovery
* Teach the rules (Website sectionin which you can expose the new moves of each peace)

