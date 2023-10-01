class Father :
    def __init__(self,char,age):
        self.char =char
        self.age = age
        
    def father(self):
        print('나는 이 집안의 아빠다')
    
    def father1(self):
        print('아빠의 성격은 :{0}이고 나이는 {1}하다'.format(self.char,self.age))