interface User {
  username: string;
}

interface SharedProps {
  user: User;
  flash: {
    message: string | null;
  };
}
