interface User {
  id: number;
  username: string;
  email: string;
}

interface SharedProps {
  user: User;
  flash: {
    message: string | null;
  };
}
