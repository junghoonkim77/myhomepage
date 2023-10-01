class Mother :
    def __init__(self,char,age):
        self.char =char
        self.age = age
        
    def mother(self):
        print('나는 이 집안의 천사 엄마이자 아내이다')
    
    def mother1(self):
        print('엄마의 성격은 :{0}이고 나이는 {1}하다'.format(self.char,self.age))