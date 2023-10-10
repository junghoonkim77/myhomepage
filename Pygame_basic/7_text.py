import pygame

pygame.init() #초기화

#화면 크기 설정
screen_width = 480  # 가로크기
screen_height = 640 # 세로크기
screen = pygame.display.set_mode( (screen_width,screen_height))


#화면 타이틀 설정 
pygame.display.set_caption('Junghoon Game') # 게임 이름

#fps
clock =pygame.time.Clock()

#배경이미지 불러오기    url경로는 copy path하면되고 슬래시로 역 슬래시를 대체해준다.
background =pygame.image.load('C:/Users/82102/Documents/GitHub/myhomepage/Pygame_basic/background.png')

#캐릭터(스프라이터 블러오기)

character = pygame.image.load('C:/Users/82102/Documents/GitHub/myhomepage/Pygame_basic/character.png')
character_size =character.get_rect().size #이미지의 크기를 구해옴
character_width = character_size[0] #캐릭터의 가로 크기
character_height = character_size[1] # 캐릭터의 세로 크기 
character_x_pos = (screen_width / 2)-(character_width /2) # 화면 가로의 절반 크기에 해당하는 곳에 위치
character_y_pos = screen_height - character_height # 화면 세로 크기 가장 아래에 해당하는 곳에 위치



# 여기까지만 실행하면 프로그램이 실행되자 마자 밑에 아무것도 없어서 끝난다 
#그래서 이벤트 루프를 만들어 줘야 한다.

#이동할 좌표
to_x =0
to_y =0

#이동 속도
character_speed = 0.6

#적 enemy 캐릭터
enemy = pygame.image.load('C:/Users/82102/Documents/GitHub/myhomepage/Pygame_basic/enemy.png')
enemy_size =enemy.get_rect().size #이미지의 크기를 구해옴
enemy_width = character_size[0] #캐릭터의 가로 크기
enemy_height = enemy_size[1] # 캐릭터의 세로 크기 
enemy_x_pos = (screen_width / 2)-(enemy_width /2) # 화면 가로의 절반 크기에 해당하는 곳에 위치
enemy_y_pos = screen_height/2 - enemy_height # 화면 세로 크기 가장 아래에 해당하는 곳에 위치

#폰트 정의 
game_font = pygame.font.Font(None,40) #폰트 객체 생성 ( 폰트, 크기)

#총시간
total_time = 10

#시간 시간 정보
start_ticks = pygame.time.get_ticks() #시작 tick을 받아옴



#이벤트 루프
running = True #게임이 진행중인가?

while running:
    dt = clock.tick(30) #여기에 프레일 설정을 해준다.
#캐릭터가 1초 동안에 100만큼 이동을 해야함
# 10fps : 1초 동안에 10번 동작 -> 1번에 10만큼 이동해야 100만큼 이동
# 20fps : 1초 동안에 20번 동작 -> 1번에 5만큼 5*20 =100만큼 이동 가능하다.
    for event in pygame.event.get():
        if event.type == pygame.QUIT: #창이 닫히는 이벤트가 발생하였는가?
            running = False #게임이 진행중이 아니라는 뜻
            
        if event.type == pygame.KEYDOWN: #키가 눌러졌는지 확인
            if event.key == pygame.K_LEFT: #캐릭터를 왼쪽으로
                to_x -=character_speed
            elif event.key == pygame.K_RIGHT: #캐릭터를 오른쪽으로
                to_x +=character_speed
            elif event.key == pygame.K_UP:   
                to_y -= character_speed
            elif event.key == pygame.K_DOWN:
                to_y += character_speed
        
        if event.type == pygame.KEYUP : # 방향키에서손을 뗐을때
            if event.key == pygame.K_LEFT or event.key == pygame.K_RIGHT:
                to_x = 0
            elif event.key == pygame.K_UP or event.key == pygame.K_DOWN:
                to_y = 0

    character_x_pos += to_x * dt   #if문을 빠져나와서 for문 안에서 진행
    character_y_pos += to_y * dt #frame별로 바뀌는 값을 dt값을 곱해서 일정하게 만들어준다.
    
    #가로 경계값 처리
    if character_x_pos <0 :
        character_x_pos =0
    elif character_x_pos >screen_width  - character_width:
        character_x_pos = screen_width  - character_width  
  #  세로 경계값 처리
    if character_y_pos < 0 :
        character_y_pos = 0
    elif character_y_pos >screen_height -character_height:
        character_y_pos = screen_height-character_height

  # 충돌처리를 위한 rect 정보 업데이트 
    character_rect = character.get_rect()
    character_rect.left = character_x_pos
    character_rect.top = character_y_pos
    
    enemy_rect = enemy.get_rect()
    enemy_rect.left = enemy_x_pos
    enemy_rect.top = enemy_y_pos
    
    #충돌체크
    if character_rect.colliderect(enemy_rect):
        print('충돌했어요')
        running = False
    

    #screen.fill((0,0,255))    
    screen.blit(background,(0,0)) #배경 그리기 (0,0)->이건 어디부터 배경을 채워 넣을건지를 의미
    
    screen.blit(character,(character_x_pos , character_y_pos)) #캐릭터 그리기
    
    screen.blit(enemy,(enemy_x_pos,enemy_y_pos)) #적그리기
    
    #타이머 집어 넣기 
    #경과 시간 계산
    elapsed_time = (pygame.time.get_ticks() -start_ticks) /1000
    #경과 시간을 1000으로 나워서 초(s)단위로 표시
    
    timer = game_font.render(str(int(total_time- elapsed_time)),True,(255,255,255))
    #출력할 글자 ,True ,글자 색상
    screen.blit(timer,(10,10))
    
    #만약 시간이 0 이하이면 게임종료
    if total_time -elapsed_time <= 0 :
        print('타임아웃')
        running =False
    
    pygame.display.update()  #게임 화면을 다시 그리기 

#잠시 대기
pygame.time.delay(2000) #2초정도 대기
    #pygame 종료
pygame.quit() # 들여쓰기가 너무 중요해서 더 피곤할수 있다. ㅠㅠ
