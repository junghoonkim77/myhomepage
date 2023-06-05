import pygame

pygame.init() #초기화

#화면 크기 설정
screen_width = 480  # 가로크기
screen_height = 640 # 세로크기
screen = pygame.display.set_mode( (screen_width,screen_height))


#화면 타이틀 설정 
pygame.display.set_caption('Junghoon Game') # 게임 이름

#배경이미지 불러오기    url경로는 copy path하면되고 슬래시로 역 슬래시를 대체해준다.
background =pygame.image.load('C:/Users/82102/Documents/GitHub/myhomepage/Pygame_basic/background.png')

# 여기까지만 실행하면 프로그램이 실행되자 마자 밑에 아무것도 없어서 끝난다 
#그래서 이벤트 루프를 만들어 줘야 한다.

running = True #게임이 진행중인가?

while running:
    for event in pygame.event.get():
        if event.type == pygame.QUIT: #창이 닫히는 이벤트가 발생하였는가?
            running = False #게임이 진행중이 아니라는 뜻
  #  pass 코드를 채 입력하기 전에 오류가 나는걸 pass로 방지한다.

    #screen.fill((0,0,255))    
    screen.blit(background,(0,0)) #배경 그리기 (0,0)->이건 어디부터 배경을 채워 넣을건지를 의미
    pygame.display.update()  #게임 화면을 다시 그리기 
    #pygame 종료
pygame.quit() # 들여쓰기가 너무 중요해서 더 피곤할수 있다. ㅠㅠ
