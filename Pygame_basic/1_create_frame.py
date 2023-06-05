import pygame

pygame.init() #초기화

#화면 크기 설정
screen_width = 480  # 가로크기
screen_height = 640 # 세로크기
screen = pygame.display.set_mode( (screen_width,screen_height))

#화면 타이틀 설정 
pygame.display.set_caption('Junghoon Game') # 게임 이름

# 여기까지만 실행하면 프로그램이 실행되자 마자 밑에 아무것도 없어서 끝난다 
#그래서 이벤트 루프를 만들어 줘야 한다.

running = True #게임이 진행중인가?

while running:
    for event in pygame.event.get():
        if event.type == pygame.QUIT: #창이 닫히는 이벤트가 발생하였는가?
            running = False #게임이 진행중이 아니라는 뜻
  #  pass 코드를 채 입력하기 전에 오류가 나는걸 pass로 방지한다.
    

#pygame 종료
pygame.quit()
